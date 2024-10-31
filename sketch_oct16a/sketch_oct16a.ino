#include <ESP8266WiFi.h>
#include <SPI.h>
#include <MFRC522.h>
#include <ESP8266HTTPClient.h>

#define SS_PIN D2
#define RST_PIN D1
MFRC522 rfid(SS_PIN, RST_PIN);

const char* ssid = "root";
const char* password = "12345678";
const char* serverUrl = "http://192.168.1.141:8090/patient/assign_tag/update/";


WiFiClient client;

void setup() {
    Serial.begin(115200);
    SPI.begin();
    rfid.PCD_Init();

    // Connect to WiFi
    Serial.println("Connecting to WiFi...");
    WiFi.begin(ssid, password);
    while (WiFi.status() != WL_CONNECTED) {
        delay(1000);
        Serial.print(".");
    }
    Serial.println("\nConnected to WiFi");
}

void loop() {
    // Check for new RFID cards
    if (!rfid.PICC_IsNewCardPresent() || !rfid.PICC_ReadCardSerial()) {
        return;
    }

    // Build the RFID tag string
    String rfidTag = "";
    for (byte i = 0; i < rfid.uid.size; i++) {
        rfidTag += String(rfid.uid.uidByte[i], HEX);
    }

    Serial.print("RFID Tag Read: ");
    Serial.println(rfidTag);

    sendRfidTagToServer(rfidTag);
}

void sendRfidTagToServer(String rfidTag) {
    if (WiFi.status() == WL_CONNECTED) {
        HTTPClient http;
        String url = serverUrl + rfidTag; // Append the RFID tag to the URL for GET request

        Serial.print("Sending GET request to URL: ");
        Serial.println(url);

        http.begin(client, url);  // Initialize the HTTP client with the GET URL

        int httpResponseCode = http.GET(); // Send the GET request

        if (httpResponseCode > 0) {
            Serial.print("Response Code: ");
            Serial.println(httpResponseCode);
            Serial.print("Server Response: ");
            Serial.println(http.getString());
        } else {
            Serial.print("Error in sending request: ");
            Serial.println(httpResponseCode);
        }

        http.end();
    } else {
        Serial.println("WiFi not connected!");
    }
}
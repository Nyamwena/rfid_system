#include <ESP8266WiFi.h>
#include <SPI.h>
#include <MFRC522.h>
#include <ESP8266HTTPClient.h>

#define SS_PIN D2
#define RST_PIN D1
MFRC522 rfid(SS_PIN, RST_PIN);

const char* ssid = "Elistair";
const char* password = "vanivini";

// Base URLs for assigning tags and viewing details
const char* assignTagUrl = "http://172.20.10.6:8090/patient/assign_tag/update/";
const char* viewDetailsUrl = "http://172.20.10.6:8090/patient/view_details/";

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
    if (Serial.available()) {
        int choice = Serial.parseInt();

        if (choice == 1) {
            Serial.println("Place the RFID tag to assign to a patient...");
            handleRfidScan(assignTagUrl);
        } else if (choice == 2) {
            Serial.println("Place the RFID tag to view patient details...");
            handleRfidScan(viewDetailsUrl);
        } else {
            Serial.println("Invalid option. Enter 1 to assign RFID tag, or 2 to view details.");
        }
    }
}

// Function to handle the RFID scanning and sending data
void handleRfidScan(const char* url) {
    // Wait until a new RFID card is present
    while (!rfid.PICC_IsNewCardPresent() || !rfid.PICC_ReadCardSerial()) {
        delay(100);
    }

    // Build the RFID tag string
    String rfidTag = "";
    for (byte i = 0; i < rfid.uid.size; i++) {
        rfidTag += String(rfid.uid.uidByte[i], HEX);
    }

    Serial.print("RFID Tag Read: ");
    Serial.println(rfidTag);

    // Send the RFID tag to the server with the specified URL
    sendRfidTagToServer(rfidTag, url);

    // Halt RFID processing for this tag
    rfid.PICC_HaltA();
}

void sendRfidTagToServer(String rfidTag, const char* baseUrl) {
    if (WiFi.status() == WL_CONNECTED) {
        HTTPClient http;
        String fullUrl = String(baseUrl) + rfidTag;  // Append the RFID tag to the URL

        Serial.print("Sending GET request to URL: ");
        Serial.println(fullUrl);

        http.begin(client, fullUrl);  // Initialize the HTTP client with the URL

        int httpResponseCode = http.GET();  // Send the GET request

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

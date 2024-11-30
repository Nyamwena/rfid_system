import './bootstrap';
import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');

const echo = new Echo({
    broadcaster: 'pusher',
    key: 'local',
    cluster: 'local',
});

echo.channel('rfid')
    .listen('RfidTagMatched', (event) => {
        const patient = event.patient;
        // Update the UI with the patient data
        document.getElementById('medical_info').classList.remove('hide-med');
        document.getElementById('disease_story').classList.remove('hide-med');
        document.getElementById('scan_to_view').textContent = "Patient Found! Medical Records Loaded.";
    });


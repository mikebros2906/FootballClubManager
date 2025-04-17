<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
</head>
<body>
    <h1>Enter your phone number</h1>
    <input type="text" id="phoneNumber" placeholder="Enter phone number">
    <button onclick="sendOtp()">Send OTP</button>

    <script>
        function sendOtp() {
            const phoneNumber = document.getElementById('phoneNumber').value;

            fetch('https://your-firebase-function-url/sendOtp', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ phoneNumber: phoneNumber })
            })
            .then(response => response.json())
            .then(data => {
                alert('OTP sent!');
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
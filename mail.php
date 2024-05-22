<?php
session_start();

// Generate random OTP
$otp = mt_rand(100000, 999999);

// Store OTP in session
$_SESSION['otp'] = $otp;

// Set your API credentials

$recipient = $_SESSION['mail'];
$from = 'ms21jiya@gmail.com';
$subject = 'Hello from Post-partum Pal';
$message = 'Your OTP is: ' . $otp;


// Set API endpoint
$url = 'https://api.mailgun.net/v3/' . $domain . '/messages';

// Set email parameters as JSON
$params = [
    'from' => $from,
    'to' => $recipient,
    'subject' => $subject,
    'text' => $message
];

// Send the email using cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $apiKey);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
$result = curl_exec($ch);

// Check for errors
if ($result === false) {
    echo 'Error: ' . curl_error($ch);
} else {
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($httpCode == 200) {
        header("Location: verify_otp.php?otp=" . $otp);
    } else {
        echo 'Failed to send email. HTTP status code: ' . $httpCode;
    }
}

// Close cURL resource
curl_close($ch);
?>
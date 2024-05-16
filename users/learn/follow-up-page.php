<?php
session_start();

// Assuming $date, $recipient, $sender, $apiKey, and $domain are already defined with appropriate values
$email=$_GET['email'];
$date = $_GET['date'];
$recipient = $email;
$sender = 'ms21jiya@gmail.com';
$apiKey = '60b4b28494cd3d27c850d3712f305f62-32a0fef1-0b0af1d5';
$domain = 'sandboxb8938a4fe0764daf9dddf9e8e632ec75.mailgun.org';
$followUpDate = date('Y-m-d', strtotime($date . ' + 10 days'));

// Set email parameters for initial email
$initialEmailParams = [
    'from' => $sender,
    'to' => $recipient,
    'subject' => 'Follow-Up Appointment Reminder',
    'html' => "
        <html>
        <head>
            <title>Follow-Up Appointment Reminder</title>
        </head>
        <body>
            <p>Hello New Mothers and All,</p>
            <p>This is a friendly reminder about your follow-up appointment scheduled for $followUpDate.</p>
            <p>Please ensure that you attend the appointment on time.</p>
            <p>Thank you and take care!</p>
        </body>
        </html>"
];

// Send the initial email using cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/' . $domain . '/messages');
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $apiKey);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($initialEmailParams));
$result = curl_exec($ch);
curl_close($ch);

// Check for errors in sending email
if ($result === false) {
    // Display error message and redirect to bookapp.php
    echo "<script>alert('Failed to send follow-up email. Please try again.')</script>";
    echo "<script>window.location.href = 'bookapp.php';</script>";
    exit();
} else {
    // Display success message and redirect to bookapp.php
    echo "<script>alert('Follow-up date has been sent to your email.')</script>";
    echo "<script>window.location.href = 'bookapp.php';</script>";
    exit();
}

?>

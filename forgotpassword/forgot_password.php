<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "../connect.php";
    $email = $_POST['email'];

    // Check if email exists
    $result = mysqli_query($con, "SELECT * FROM usr WHERE email='$email'");
    
    if (mysqli_num_rows($result) > 0) {
        
        $otp = mt_rand(100000, 999999); // Generate random OTP
        $_SESSION['otp'] = $otp; // Store OTP in session
        $expTime = date("Y-m-d H:i:s", strtotime('+1 hour'));
        // Set your Mailgun API credentials
      
        $recipient = $email;
        $from = 'ms21jiya@gmail.com';
        $subject = 'Password Reset OTP';
        $message = 'Your OTP is: ' . $otp;

 // Insert the token into the database
 mysqli_query($con, "INSERT INTO password_resets (email, token, expTime) VALUES ('$email', '$otp', '$expTime')");
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

                header("Location: otp.php"); // Redirect to OTP verification page
            } else {
                echo 'Failed to send email. HTTP status code: ' . $httpCode;
            }
        }

        // Close cURL resource
        curl_close($ch);
    } else {
        echo "Email does not exist.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        input[type="email"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="forgot_password.php" method="POST">
        <h2 style="text-align: center; margin-bottom: 20px;">Forgot Password</h2>
        <input type="email" name="email" placeholder="Enter your email address" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>


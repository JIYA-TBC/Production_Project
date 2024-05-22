<?php
include "../connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $password = $_POST['password'];

    // Validate token and expiration time
    $result = mysqli_query($con, "SELECT * FROM password_resets WHERE token='$token'");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];

        // Update the user's password
        mysqli_query($con, "UPDATE usr SET pass='$password' WHERE email='$email'");

        // Delete the token
        mysqli_query($con, "DELETE FROM password_resets WHERE token='$token'");

        echo '<script>alert("Your password has been reset successfully."); window.location.href = "../index.php";</script>';
        exit();
    } else {
        echo "Invalid or expired token.";
    }
} else if (isset($_GET['user_otp'])) {
    $token = $_GET['user_otp'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px; 
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="reset_password.php" method="POST">
        <input type="hidden" name="token" value="<?php echo ($token); ?>">
        <h2>Reset Password</h2>
        <input type="password" name="password" placeholder="Enter your new password" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>

<?php
} else {
    echo "Invalid request.";
}
?>

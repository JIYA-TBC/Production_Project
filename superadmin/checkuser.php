<?php
session_start();
include "connect.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $result = mysqli_query($con, "SELECT * FROM s_admin WHERE email='$email' AND password='$password'");
  if (mysqli_num_rows($result) == 1) {
      $_SESSION['super_admin'] = $email; 
      header("Location: dashboard.php"); 
  } else {
      echo "<span class='status-not-available' style='color:red;'><b>Invalid email or password</b></span>";
  }
}
?>
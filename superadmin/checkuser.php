<?php
include "connect.php";
if(!empty($_POST["email"])) {
  $result = mysqli_query($con,"SELECT count(*) FROM s_admin WHERE email='" . $_POST["email"] . "'");
  $row = mysqli_fetch_row($result);
  $user_count = $row[0];
  if($user_count>0) {
      echo "<span class='status-not-available' style='color:red;'><b>Email exist</b></span>";
  }else{
      echo "<span class='status-available' style='color:green;'><b>Valid!</b></span>";
  }
}
?>
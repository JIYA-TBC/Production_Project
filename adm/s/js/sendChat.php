<?php
session_start();
    $curUser = $_POST['user'];
    $msg = $_POST['message'];

    include "../../../connect.php";

    $send = mysqli_query($con, "INSERT INTO livechat(sender, reciever, message) VALUES('admin','".$curUser."','".$msg."')");
    if($send == true){
        echo "sent";
    }else{
        echo "not sent";
    }
?>
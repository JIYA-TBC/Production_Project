<?php
session_start();
    $curUser = $_POST['user'];
    $msg = $_POST['message'];

    include "../connect.php";

    $send = $con->query("INSERT INTO livechat(sender, message) VALUES('".$curUser."','".$msg."')");
    if($send == true){
        echo "sent";
    }else{
        echo "not sent";
    }
?>
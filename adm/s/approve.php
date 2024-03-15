<?php

include "../../connect.php";

	
	$result = mysqli_query($con,"UPDATE book_app SET status='Approved' WHERE id='".$_GET["id"]."' ");
	if(!empty($result)){
		
		echo "<script> alert('Appointment Approved!')</script>";
		echo "<p style='color:green;'>Redirecting you to page in 1 seconds...</p>";
		echo "<meta http-equiv='Refresh' content='0; url=bookapp.php'>";
	}

?>
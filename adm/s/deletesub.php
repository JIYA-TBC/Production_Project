<?php
include"../../connect.php";

	$result = mysqli_query($con,"DELETE FROM sub_j WHERE id='".$_GET["id"]."' ");
	if(!empty($result)){
		
		echo "<script> alert('subject deleted!')</script>";
		echo "<p style='color:green;'>Redirecting you to page in 2 seconds...</p>";
		echo "<meta http-equiv='Refresh' content='0; url=sub.php'>";
	}
?>
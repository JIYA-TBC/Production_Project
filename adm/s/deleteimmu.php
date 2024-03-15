<?php
include"../../connect.php";

	$result = mysqli_query($con,"DELETE FROM imm_uze WHERE id='".$_GET["id"]."' ");
	if(!empty($result)){
		
		echo "<script> alert('Vaccine deleted!')</script>";
		echo "<p style='color:green;'>Redirecting you to page in 1 seconds...</p>";
		echo "<meta http-equiv='Refresh' content='0; url=immunize.php'>";
	}
?>
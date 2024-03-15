<?php
include "../../connect.php";

	$result = mysqli_query($con,"DELETE FROM vidl_ink WHERE id='".$_GET["id"]."' ");
	if(!empty($result)){
		
		echo "<script> alert('Video Link deleted!')</script>";
		echo "<p style='color:green;'>Redirecting you to page in 2 seconds...</p>";
		echo "<meta http-equiv='Refresh' content='2; url=upvideolink.php'>";
	}

?>
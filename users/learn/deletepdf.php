<?php
include"../../connect.php";

if(!empty($_GET["id"])) {
	$result = mysqli_query($con,"DELETE FROM que_st WHERE id='".$_GET["id"]."' ");
	if(!empty($result)){
		
		echo "<script> alert('question deleted!')</script>";
		echo "<p style='color:green;'>Redirecting you to page in 2 seconds...</p>";
		echo "<meta http-equiv='Refresh' content='0; url=assinpdf.php'>";
	}
}
?>
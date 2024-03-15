<?php
include"../../connect.php";

if(!empty($_GET["id"])) {
	$delfile=mysqli_query($con,"select * from text_tutor where id='".$_GET["id"]."' ");
	while($delfet=mysqli_fetch_object($delfile)){
//unlink($delfet->path);
	}
	$result = mysqli_query($con,"DELETE FROM text_tutor WHERE id='".$_GET["id"]."' ");
	if(!empty($result)){
		
		echo "<script> alert('text deleted!')</script>";
		echo "<p style='color:green;'>Redirecting you to text page in 2 seconds...</p>";
		echo "<meta http-equiv='Refresh' content='0; url=uptext.php'>";
	}
}
?>
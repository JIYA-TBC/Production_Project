<?php
include"../../connect.php";

if(!empty($_GET["id"])) {
	$delfile=mysqli_query($con,"select * from pd_f where id='".$_GET["id"]."' ");
	while($delfet=mysqli_fetch_object($delfile)){
unlink($delfet->path);
	}
	$result = mysqli_query($con,"DELETE FROM pd_f WHERE id='".$_GET["id"]."' ");
	if(!empty($result)){
		
		echo "<script> alert('pdf deleted!')</script>";
		echo "<p style='color:green;'>Redirecting you to pdf page in 2 seconds...</p>";
		echo "<meta http-equiv='Refresh' content='2; url=uppdf.php'>";
	}
}
?>
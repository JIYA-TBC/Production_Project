<?php
include"../../connect.php";

if(!empty($_GET["id"])) {
	$delfile=mysqli_query($con,"select * from vi_d where id='".$_GET["id"]."' ");
	while($delfet=mysqli_fetch_object($delfile)){
unlink($delfet->vid_path);
	}
	$result = mysqli_query($con,"DELETE FROM vi_d WHERE id='".$_GET["id"]."' ");
	if(!empty($result)){
		
		echo "<script> alert('Video deleted!')</script>";
		echo "<p style='color:green;'>Redirecting you to video page in 2 seconds...</p>";
		echo "<meta http-equiv='Refresh' content='2; url=upvideos.php'>";
	}
}
?>
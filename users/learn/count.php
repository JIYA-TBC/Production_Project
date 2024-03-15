<?php

	
	
	
	function quiz(){
		
		include"../../connect.php";
	include "session_st.php";
	$quiz_count=mysqli_query($con,"select * from ansed_quiz WHERE userid='$us' AND status='1' ") or die(mysqli_error($con));
	$count=mysqli_num_rows($quiz_count);
	echo $count;
	}
	
	function compl(){
		include"../../connect.php";
	include "session_st.php";
		$quiz_count1=mysqli_query($con,"select * from ansed_quiz WHERE userid='$us'") or die(mysqli_error($con));
	$count1=mysqli_num_rows($quiz_count1);
	echo $count1;
		
	}
	
	function total_quiz(){
		include"../../connect.php";
	include "session_st.php";
		$quiz_count2=mysqli_query($con,"select * from quiz_ WHERE level='$stage'") or die(mysqli_error($con));
	$count2=mysqli_num_rows($quiz_count2);
	echo $count2;
		
	}
	
	function know_link(){
		include"../../connect.php";
	include "session_st.php";
		$linkoff=mysqli_query($con,"select * from pick_off WHERE user_id='$us'") or die(mysqli_error($con));
	$linkecho=mysqli_fetch_assoc($linkoff);
	echo $linkecho['link_in'];
		
	}

	function cert(){
		include"../../connect.php";
	include "session_st.php";
		$mysqli1="select DISTINCT user_id from scores where user_id='".$us."'";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
	$for_show=mysqli_num_rows($myquery1);

	if($for_show==1){
		echo "<h3>Congratulation!.. Your certificate is now Available</h3>";
		echo "<a href='certificate.php'><button class='btn btn-success'>Collect Certificate</button>";
	}
	else{
		echo "";
	}
	}
	
	




?>
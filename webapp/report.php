<?php
	session_start(); //starts the session
	$id = $_SESSION['userid'];

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
		mysql_select_db("webapp") or die("Cannot connect to database"); //Connect to database
		$postid = $_GET['id'];
		$query = mysql_query("SELECT * FROM limitreport WHERE userid = '$id' AND postid = '$postid'");
		$exists = mysql_num_rows($query);
		if ($exists > 0) {
			Print '<script>alert("Sorry, you already reported this post!");</script>';
			Print '<script>window.location.assign("userPagev2.php");</script>';
		}else{
			$date = date('Y-m-d H:i:s');
			mysql_query("INSERT INTO limitreport (userid,postid) VALUES ('$id','$postid')");
			mysql_query("UPDATE posts SET reports = reports + 1 WHERE postid = $postid");
			mysql_query("UPDATE posts SET datereported = '$date' WHERE postid = $postid");
			header("location: userPagev2.php");
		}
	}
?>
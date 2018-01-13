<?php
	session_start(); //starts the session
	$postid = $_SESSION['postcommentid'];

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
		mysql_select_db("webapp") or die("Cannot connect to database"); //Connect to database
		$commid = $_GET['id'];
		mysql_query("DELETE FROM comments WHERE commentid = '$commid'");
		Print '<script>window.location.assign("commentspage.php?id=' . $postid . '");</script>';
	}
?>
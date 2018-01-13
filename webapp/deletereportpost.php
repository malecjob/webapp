<?php
	session_start(); //starts the session

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
		mysql_select_db("webapp") or die("Cannot connect to database"); //Connect to database
		$id = $_GET['id'];
		mysql_query("DELETE FROM posts WHERE postid='$id'");
		mysql_query("DELETE FROM comments WHERE postid='$id'");
		mysql_query("DELETE FROM limitreport WHERE postid='$id'");
		header("location: reports.php");
	}
?>
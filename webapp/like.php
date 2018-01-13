<?php
	session_start();
	$id = $_SESSION['userid'];

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
		mysql_select_db("webapp") or die("Cannot connect to database"); //Connect to database
		$postid = $_GET['id'];
		$query = mysql_query("SELECT * FROM likes WHERE userid = $id AND postid = $postid");
		$exists = mysql_num_rows($query);
		if ($exists > 0) {
			mysql_query("DELETE FROM likes WHERE userid = $id AND postid = $postid");
			header("location: userPagev2.php");
		}else {
			$query2 = mysql_query("INSERT INTO likes (postid,userid) VALUES ('$postid', '$id')");
			header("location: userPagev2.php#backHere");
		}
	}
?>
<?php

session_start();
$id = $_SESSION['userid'];
$fname = $_SESSION['userfname'];
$lname = $_SESSION['userlname'];
$pic = $_SESSION['profpic'];
$post = htmlspecialchars($_POST['tfArea']);

mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("webapp") or die("Cannot connect to database");
$query = mysql_query("SELECT * from users WHERE userid='$id'");
$exists = mysql_num_rows($query);
$tablename = "";
$tablepic = "";
$table_idpost = "";

if ($exists > 0) {
	while ($row = mysql_fetch_assoc($query)) {
		$table_idpost = $row['userid'];
		if (isset($_POST['anon'])) {
			$tablepic = "anon.jpg";
			$tablename = "Anonymous";
			$_SESSION['postid'] = $table_idpost;
			mysql_query("INSERT INTO posts (submittext,sender,senderpic,userpostid) VALUES ('$post','$tablename','$tablepic','$id')");
			header("location: userPagev2.php");
		}else {
			$tablepic = $row['profpic'];
			$tablename = $row['firstname'];
			$_SESSION['postid'] = $table_idpost;
			mysql_query("INSERT INTO posts (submittext,sender,senderpic,userpostid) VALUES ('$post','$tablename','$tablepic','$id')");
			header("location: userPagev2.php");
		}
	}
}
?>
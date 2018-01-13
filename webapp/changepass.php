<?php

session_start();
$id = $_SESSION['userid'];
$oldpass = md5($_POST['oldpassword']);
$newpass = md5($_POST['newpassword']);
$confpass = md5($_POST['confnewpass']);

mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("webapp") or die("Cannot connect to database");
$query = mysql_query("SELECT * from users WHERE userid='$id'");
$exists = mysql_num_rows($query);
$table_pass = "";

if ($exists > 0) {
	while ($row = mysql_fetch_assoc($query)) {
		$table_pass = $row['password'];
	}
	if ($oldpass == $table_pass) {
		if ($newpass == $confpass) {
			if (preg_match('/\s/',$newpass) or preg_match('/\s/',$confpass) or preg_match('/\s/', $oldpass)) {
				Print '<script>alert("Passwords must not contain white space(s)");</script>';
				Print '<script>window.location.assign("userPagev2.php");</script>';
			}
			elseif (($table_pass == $oldpass) && ($table_pass == $newpass) && ($table_pass == $confpass)) {
				Print '<script>alert("Old and new password are the same");</script>';
				Print '<script>window.location.assign("userPagev2.php");</script>';
			}
			else {
			mysql_query("UPDATE users SET password= '$newpass' WHERE userid='$id'");
			Print '<script>alert("Password changed!");</script>';
			Print '<script>window.location.assign("userPagev2.php");</script>';
			}
		}else{
			Print '<script>alert("New passwords do not match");</script>';
			Print '<script>window.location.assign("userPagev2.php");</script>';
		}
	}else {
		Print '<script>alert("Old password is incorrect!");</script>';
		Print '<script>window.location.assign("userPagev2.php");</script>';
	}
}

?>
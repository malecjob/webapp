
<?php

/*

DELETE.PHP

Deletes a specific entry from the 'players' table

*/



// connect to the database

include('connect.php');



// check if the 'id' variable is set in URL, and check that it is valid
 

if (isset($_GET['userid']) && is_numeric($_GET['userid']))

{
 

// get id value

$userid = $_GET['userid'];



// delete the entry
 
 
$result = mysql_query("DELETE FROM users WHERE userid=$userid")

or die(mysql_error());



// redirect back to the view page

header("Location: users.php");

}

else

// if id isn't set, or isn't valid, redirect back to view page

{


header("Location: users.php");

}



?>
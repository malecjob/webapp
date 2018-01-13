<?php

	$connection = mysql_connect('localhost', 'root', '');

	mysql_select_db('webapp');

	$search = strip_tags(substr($_POST['searchit'],0, 100));

	$search = mysql_escape_string($search); // Attack Prevention


	if($search=="")

	echo "";

	else{

	$query = mysql_query("SELECT * FROM users WHERE userid LIKE '{$search}%'", $connection);//

	$string = '';

	if (mysql_num_rows($query)){

	while($row = mysql_fetch_assoc($query)){

	$string .= "<b>".$row['userid']."</b> -  ";
	$string .= "<b>".$row['firstname']."</b> ";
	$string .= "<b>".$row['lastname']."</b>  ";

	$string .= "<br/>\n";

	}
	 

	}else
	{
	

	}


	echo $string;

	}

	?>
			
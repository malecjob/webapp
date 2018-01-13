<?php

/*

EDIT.PHP

Allows user to edit specific entry in database

*/



// creates the edit record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($userid, $firstname, $lastname, $error)

{

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">

<html>

<head>

<title>Edit Record</title>
<!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="resource/images/logo2.png">


</head>

<body>

	 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color:#2E7D32;">
            <div class="navbar-header">
                <a class="navbar-brand" href="users.php" style="color:#FFCC33;">Admin Panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw" style="color:#FFCC33;"></i>  <i class="fa fa-caret-down" style="color:#FFCC33;"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       
                       
                        <li><a href="indexv2.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

           <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="users.php"><i class="fa fa-users fa-fw"></i> User Management</a>
                        </li>

                         
						 <li>
                            <a href="reports.php"><i class="fa fa-warning fa-fw" style="color:red;"></i> Reported Posts</a>
                        </li>     
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-topic-side -->
        </nav>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User Management</h1>
                </div>
                </div>
            <!-- /.row -->
            <br>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        
   
  
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">


<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>

  <thead>
                                        <tr>
                                            <th>ID #</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                 
                                        <tr>       

<form  action="" method="post">




<input type="hidden" name="userid" value="<?php echo $userid; ?>"/>

<div>



          
<td> <?php echo $userid; ?></p></td>

<td> <input type="text" name="firstname" value="<?php echo $firstname; ?>"/><br/></td>

<td> <input type="text" name="lastname" value="<?php echo $lastname; ?>"/><br/></td>

<td>	<button type="submit" name="submit" value="" class="btn btn-success btn-circle "><i class="fa fa-check"></i></button></td>
  

</div>

</form>

          


<?php

}







// connect to the database

include('connect.php');



// check if the form has been submitted. If it has, process the form and save it to the database

if (isset($_POST['submit']))

{

// confirm that the 'userid' value is a valid integer before getting the form data

if (is_numeric($_POST['userid']))

{

// get form data, making sure it is valid

$userid = $_POST['userid'];

$firstname = mysql_real_escape_string(htmlspecialchars($_POST['firstname']));

$lastname = mysql_real_escape_string(htmlspecialchars($_POST['lastname']));



// check that firstname/lastname fields are both filled in

if ($firstname == '' || $lastname == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



//error, display form

renderForm($userid, $firstname, $lastname, $error);

}

else

{

// save the data to the database

mysql_query("UPDATE users SET firstname='$firstname', lastname='$lastname' WHERE userid='$userid'")

or die(mysql_error());



// once saved, redirect back to the view page

header("Location: users.php");

}

}

else

{

// if the 'userid' isn't valid, display an error

echo 'Error!';

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'userid' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['userid']) && is_numeric($_GET['userid']) && $_GET['userid'] > 0)

{

// query db

$userid = $_GET['userid'];

$result = mysql_query("SELECT * FROM users WHERE userid= $userid")

or die(mysql_error());

$row = mysql_fetch_array($result);



// check that the 'userid' matches up with a row in the databse

if($row)

{



// get data from db

$firstname = $row['firstname'];

$lastname = $row['lastname'];



// show form

renderForm($userid, $firstname, $lastname, '');

}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'userid' in the URL isn't valid, or if there is no 'userid' value, display an error

{

echo 'Error!';

}

}

?>

 <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="bower_components/raphael/raphael-min.js"></script>
    <script src="bower_components/morrisjs/morris.min.js"></script>
    <script src="js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
</body>
</html>

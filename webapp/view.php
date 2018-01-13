<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">


<html>

<head>

<title>View Records</title>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css" >

   
    #display_results {
    
    color: black;
    

    background: #CCCCFF;
    }


    </style>
    <script type="text/javascript "src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

    <script type='text/javascript'>

    $(document).ready(function(){

    $("#search_results").slideUp();

    $("#button_find").click(function(event){

    event.preventDefault();

    search_ajax_way();

    });

    $("#search").keyup(function(event){

    event.preventDefault();

    search_ajax_way();

    });

     

    });

     

    function search_ajax_way(){

    $("#search_results").show();

    var search_this=$("#search").val();

    $.post("search.php", {searchit : search_this}, function(data){

    $("#display_results").html(data);

     

    });

    }



    </script>


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
                        <li><a href="settings.html"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <a href="email.html"><i class="fa fa-envelope-o fa-fw"></i> Emails</a>
                        </li>   
						 <li>
                            <a href="reports.html"><i class="fa fa-warning fa-fw" style="color:red;"></i>Reported Posts</a>
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
                    <h1 class="page-header">Users</h1>
                </div>
                <!--SEARCH -->
                  


                         


                <!--SEARCH -->
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <br>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User Management
   
  
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">


<?php
/*

VIEW.PHP

Displays all data from 'players' table

*/



// connect to the database

include('connect.php');



// get results from database

$result = mysql_query("SELECT * FROM users")

or die(mysql_error());



// display data in table











// loop through results of database query, displaying them in the table

while($row = mysql_fetch_array( $result )) {
                                               

   

            echo "<tr>";
            echo '<td>' . $row['userid'] . '</td>';
            echo '<td>' . $row['firstname'] . '</td>';
            echo '<td>' . $row['lastname'] . '</td>';
            echo '<td><a href="edit.php?userid=' . $row['userid'] .'">  <button type="button" class="btn btn-success btn-circle"><i class="fa fa-pencil"></i></button></a>
                    <a href="delete.php?userid=' .$row['userid'] .'">  <button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></a>

            </td>';
                            
                    


                   echo "</tr>";


        }







// close table>



?>
 <thead>
                                        <tr>
                                            <th>ID #</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>                        
                                 







</body>

</html>
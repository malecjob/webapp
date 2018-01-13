<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>USC FW Admin Panel</title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css" >

   
    #display_results {
    
    color: black;
    width: 96%;
    margin-left: 20px;
    background: white;
    margin-top: 5px;
    margin-bottom: -10px;
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
                        <i class="fa fa-user fa-fw"  style="color:#FFCC33;"></i>  <i class="fa fa-caret-down"  style="color:#FFCC33;"></i>
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
                <!--SEARCH -->
                    <?php


                                include "connect.php";

                                $sql = "SELECT * FROM users ";


                                if(isset($_POST['search'])){

                                 $search = mysql_real_escape_string($_POST['search']);

                                 $sql .= "WHERE userid LIKE '{$search}%'"; 
                                
                                }   



                                $query = mysql_query($sql) or die(mysql_error());


                                ?>


                          <form method="post" id="searchform" class="input-group-btn" >
             
								<div class="pull-left" style="margin-left:15px; width: 97%;">
									<i class="glyphicon glyphicon-search"></i>
									<input type="text" class="form-control" name="search" id="search" placeholder="Search ID number..." required="required">
								</div>
                            </form>
                        
                        <div id="display_results">
                                      </div>


                <!--SEARCH -->
                <!-- /.col-lg-12 -->
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


                                    <!--DATABASE -->

                                                                     

                              <thead>
                                        <tr>
                                            <th>ID #</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Action</th>
                                        </tr>
                                            <?php 
                                                 if(mysql_num_rows($query) >0 ){
                                                while ($row = mysql_fetch_array($query))

                                                {   




                                             ?>

                                    </thead>
                                    <tbody>
                                        <tr>   
                                            <td><?php echo $row['userid']; ?></td>
                                            <td><?php echo $row['firstname']; ?></td>
                                            <td><?php echo $row['lastname']; ?></td>
                                            <td><?php Print '<a href="edit.php?userid=' . $row['userid'] .'">  <button type="button" class="btn btn-success btn-circle"><i class="fa fa-pencil"></i></button></a>
                                                <a href="#"onclick="deleteUser('.$row['userid'].')">  <button type="button" class="btn btn-warning btn-circle "><i class="fa fa-times"></i></button></a>
                                            </td>
                                            ';
                                            ?>
                                        </tr>                     
                                 
                                            <?php 

                                                 
                                                    
                                                    }
                                                }else
                                                {
                                                            Print '<script>alert("No Result Found!");</script>';
                                                            ?>
                                                            <script>
                                                            window.location.assign("users.php");
                                                            </script>
                                                            <?php
                                                }
                                            
                                               ?>
                                               
 

                <!-- END DATABASE -->
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>

     
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
	<script type=text/javascript>
		function deleteUser(id)
						{
						var r=confirm("Are you sure you want to delete this user?");
						if (r==true)
						  {
						  	window.location.assign("delete.php?userid=" + id);
						  }
						}
	</script>
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



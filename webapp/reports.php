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


</head>

<body>

		 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color:#2E7D32;">
            <div class="navbar-header">
                </button>
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
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Reported Posts</h1>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<div class="row">

                    <div class="col-lg-12  " >
                        <?php 

                            mysql_connect("localhost", "root","") or die(mysql_error());
                            mysql_select_db("webapp") or die("Cannot connect to database");
                            $query = mysql_query("Select * from posts WHERE reports > 0 ORDER BY reports DESC");

                            while ($row = mysql_fetch_assoc($query)) {
                                $tablepost = $row['submittext'];
                                $tablename = $row['sender'];
                                $timestamp = $row['datereported'];
                                $tablereports = $row['reports'];

                                Print '
                                <div class="panel panel-red  ">
                                    <div class="panel-heading "> ';
                                        Print $tablename; Print '
                                        <a onclick="deletepost('.$row['postid'].')" href="#"><i class="fa fa-times-circle-o pull-right" style="color:white; font-size:20pt;"></i></a>
                                    </div>
                                    <div class="panel-body">
                                        <p>';Print $tablepost; Print'</p>
                                    </div>
                                   <div class="panel-footer">
                                       Last date reported:'; echo date('m/d/Y', strtotime($timestamp));  echo "<br> Total reports: " . $tablereports; Print '
                                    </div>
                                </div>
                                ';
                            }
                        ?>
                    </div>

                    <script>
                            function deletepost(id)
                            {
                            var r=confirm("Are you sure you want to delete this reported post?");
                            if (r==true)
                              {
                                window.location.assign("deletereportpost.php?id=" + id);
                              }
                            }
                    </script>
               
            </div>
            <!-- /.row -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
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
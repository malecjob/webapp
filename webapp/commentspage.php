<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>USC Freedom Wall</title>
    	<!--CSS-->
    	<link rel="stylesheet" type="text/css" href="resource/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="resource/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="resource/customcss/userPage.css">
        <link rel="icon" type="image/png" href="resource/images/logo2.png">

	</head>

	<?php
		session_start(); //starts the session
		if($_SERVER['REQUEST_METHOD'] == "GET")
		{
			$postid = $_GET['id'];
			$_SESSION['postcommentid'] = $postid;
		}
		$id = $_SESSION['userid']; //assigns user value
		$fname = $_SESSION['userfname'];
		$lname = $_SESSION['userlname'];
		$pic = $_SESSION['profpic'];
		$password = $_SESSION['pass'];
	?>

	
	<body>
		<!--NAV-->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<ul class="nav navbar-nav">
							<li><a href="userPagev2.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						</ul>
					</div>
					<div class="col-sm-3">
						<ul class="nav navbar-nav">
							<li><img src="resource/images/logo2.png" id="logo-nav"></li>
						</ul>
					</div>
					<div class="col-sm-4">
												<div class="divider"></div>
												
						<ul class="nav navbar-nav navbar-right">
			
						  <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			          		<img src="resource/images/<?php Print $pic; ?>" class="img-circle" id="userPic">
				          	</span> <?php Print $fname; ?> <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			          <li>
			          	<div class="navbar-content">
			          		<div class="row">
			          			<div class="col-md-5">
			          				<img src="resource/images/<?php Print $pic; ?>" alt="" class="img-circle" style="heigth:100px;width:100px;">
											
			          			</div>
											<div class="col-md-7">
												<span><strong><?php Print $fname; ?> <?php Print $lname; ?></strong></span>
												<p class="text-muted small"><?php Print $id ?></p>
											</div>
			          		</div>
			          	</div>
									<div class="navbar-footer">
										<div class="navbar-footer-content">
											<div class="row">
												<div class="col-md-6">
													<a href="#changePass" data-toggle="modal" class="btn btn-success btn-sm">Change Password</a>
												</div>
												<div class="col-md-6">
													<a href="signout.php" class="btn btn-success btn-sm pull-right">Sign Out</a>
												</div>
											</div>
										</div>
									</div>
			          </li>
			          </ul>
			        </li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		<!--END OF NAV-->
		<!--Content-->
		<div class="container" style="margin-top:50px;">
			<div class="row profile">
				<div class="col-sm-3">
					<div class="profile-sidebar">
							<div class="profile-userpic" >
										<a href="#viewPic" data-toggle="modal"><img src="resource/images/<?php Print $pic; ?>" class="img-responsive img-circle" alt=""></a>
    									</div>
    									<div class="profile-usertitle">
    									<div class="profile-usertitle-name">
                						<?php Print $id; ?><br>
    									<?php Print $fname ?> <?php Print $lname ?>
    									</div>
    						<div class="profile-usertitle-course">
    							BSICT
	    					</div>
	    				</div>
	    				<div class="profile-usermenu">
	    					<ul class="nav">
	    						<li>
	    							<a href="#rules" data-toggle="modal">
	    							<i class="glyphicon glyphicon-flag"></i>
	    							Rules </a>
	    						</li>
	    					</ul>
    					</div>
					</div>
					<iframe src="http://usc.edu.ph/" width="100%" height="400" style="border:none;overflow:hidden;margin-top:10px;" scrolling="yes" frameborder="0" allowTransparency="true"></iframe>
				</div>

				<div class="col-sm-7" id="viewComments" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content" style="margin-top:-30px;">

				<?php

						mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
						mysql_select_db("webapp") or die("Cannot connect to database");
						$query = mysql_query("Select * from posts WHERE postid='$postid'");


						while ($row = mysql_fetch_assoc($query)) {
							$tablepost = $row['submittext'];
							$tablename = $row['sender'];
							$tablepic = $row['senderpic'];
							$timestamp = $row['hrs'];
							$tablepostid = $row['userpostid'];

													
								Print ' 
									<div class="well">
									<div class="media">
										<a class="pull-left" href="#"><img class="media-object" src="resource/images/'; Print $tablepic; Print '"></a>
										<div class="media-body">
											<strong style="color:#2E7D32">'; Print $tablename; Print '</strong><span class="time">'; echo " ";echo date('m/d/Y', strtotime($timestamp));  Print '</span><br>';
											echo nl2br($tablepost);
										Print '
										</div>
										
									</div>
									</div>
								';
							}
					?>
			
							<div class="modal-header"><h4><b>View Comments</b></h4>
							</div>
							<div class="modal-body">
								<?php
									mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
									mysql_select_db("webapp") or die("Cannot connect to database");
									$query = mysql_query("SELECT * FROM comments");


									while ($row = mysql_fetch_assoc($query)) {
										$tableid = $row['commentid'];
										$tablecomment = $row['comment'];
										$tablepic = $row['profpic'];
										$tablename = $row['name'];
										$tablepostid = $row['postid'];
										$tableuserid = $row['userid'];
										$tabledate = $row['commentdate'];


										if ($postid == $tablepostid) {
											Print ' 
												<div class="well">
												<div class="media">
													<a class="pull-left" href="#"><img class="media-object" src="resource/images/'; Print $tablepic; Print '"></a>
													<div class="media-body">
														<strong style="color:#2E7D32">'; Print $tablename; Print '</strong>';
														echo " ";echo date('m/d/Y', strtotime($tabledate)); echo "<br>";
														Print $tablecomment;
														Print '
														</div>';
														if ($id == $tableuserid) {
															Print '
																<ul class="list-inline list-unstyled interact-sec">
<li><a href="editcomment.php?commentid='.$row['commentid'].'" data-hover="tooltip" data-placement="bottom" data-original-title="Edit"><span class="fa fa-pencil"></span></a></li>
																		<li>|</li>
																		<li><a href="#Delete"  onclick="deletecomment('.$row['commentid'].')" data-hover="tooltip" data-placement="bottom" data-original-title="Delete"><span class="fa fa-times"></span></a></li>
																</ul>
															';
														}
														Print '
														</div>
														</div>
												';
										}
									}
								?>

								<script>
									function deletecomment(id)
									{
									var r=confirm("Are you sure you want to delete this comment?");
									if (r==true)
									  {
									  	window.location.assign("deletecomment.php?id=" + id);
									  }
									}

									function editcomment(id)
									{
									  	window.location.assign("editcomment.php?id=" + id);
									}
								</script>

							</div>
							<div class="modal-footer">
								<form action="comment.php" method="POST" class="form-inline">
									<input type="text" name="comm" class="pull-left" required="required" placeholder="Write a comment..." style="width:70%;padding:5px;">
									<button type="Submit" class="btn btn-success">Comment</button>
									<a href="userPagev2.php"><button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button></a>
								</form>
							</div>
						</div>
					</div>
				</div>
					
					
					<!--End of Wells -->
				<div class="col-sm-2">
							<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftodayscarolinian%2F%3Ffref%3Dts&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
							<iframe class="marg" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fwarriorsturf%2F%3Ffref%3Dts&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
				</div>
				
			</div>
		</div>
		<!--END OF CONTENT-->
		<!--MODALS-->
		<div class="modal fade" id="message" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header"><h4><b>View Messages</b></h4></div>
						<div class="modal-body">
							<div class="list-group chat-user-list">
								<a href="#inbox" data-toggle="modal" class="list-group-item">
									<div class="media-left" ><div><img src="resource/images/jm.jpg" class="img-circle media-object" alt=""></div></div>
									<div class="media-body">
                      <div class="media-heading">
                          <b>JM Gula</b>
                          <p><span><i class="fa fa-reply"></i></span> Hahahaha</p>
                      </div>
                  </div>
								</a>
								<a href="#" class="list-group-item">
									<div class="media-left" ><div><img src="resource/images/Alec.jpg" class="img-circle media-object" alt=""></div></div>
									<div class="media-body">
                      <div class="media-heading">
                          <b>Alec Melchor</b>
                          <p><span><i class="fa fa-reply"></i></span> ULOL</p>
                      </div>
                  </div>
								</a>
							</div>
						</div>
				</div>
			</div>
		</div>

		<div class="modal" id="viewPic" role="dialog">
      <div class="modal-dialog">>
          <div class="modal-content mView" id="viewPic2">
            <img src="resource/images/<?php Print $pic ?>" class="center-block">
          </div>
      </div>
    </div>

		<div class="modal" id="viewComments" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header"><h4><b>View Comments</b></h4></div>
					<div class="modal-body">
						

					</div>
					<div class="modal-footer">
						<form action="comment.php" method="POST" class="form-inline">
							<input type="text" name="comm" class="pull-left" placeholder="Write a comment..." style="width:80%;padding:5px;">
							<button type="Submit" class="btn btn-success">Comment</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="modal" id="report" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-body" style="text-align:center;"><h4>Report this post?</h4></div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success">OK</button>
						<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal" id="delete" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-body" style="text-align:center;"><h4>Delete this post?</h4></div>
					<div class="modal-footer">
						<form method="post" action="deletepost.php">
						<button type="submit" class="btn btn-success">OK</button>
						<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="modal" id="changePass" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header"><h4><b>Change Password</b></h4></div>
					<div class="modal-body" style="padding:10px;">
						<form action="changepass.php" method="POST">
							<div class="form-group form-inline">
								<label for="pwd"> Password:</label><br>
								<input type="password" name="oldpassword" id="pwd" class="form-control" required="required">
							</div>
							<div class="form-group form-inline">
								<label for="pwd">New Password:</label>
								<input type="password" name="newpassword" id="pwd" class="form-control" required="required">
							</div>
							<div class="form-group form-inline">
								<label for="pwd">Confirm New Password:</label>
								<input type="password" name="confnewpass" id="pwd" class="form-control" required="required">
							</div>
							<button type="submit" class="btn btn-success btn-sm">Change Password</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="modal" id="edit" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header"><h4><b>Edit Post</b></h4></div>
					<div class="modal-body" style="padding:10px;">
						<form action="" method="POST">
							<textarea style="width:100%; resize:none;"></textarea>
							
						
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success btn-sm">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="modal" id="rules" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header"><h4><b>Rules!</b></h4></div>
					<div class="modal-body">
						<ol>
							<li>No spamming.</li>
							<li>No lewd posts.</li>
							<li>No bullying.</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

		<div class="modal" id="inbox" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<div class="row">
							<div class="col-sm-4">
								<button class="btn btn-link backMsg" data-dismiss="modal"><i class="fa fa-chevron-left fa-2x pull-left"></i>Back</button>
							</div>
							<div class="col-sm-6">
									<span><img src="resource/images/jm.png" class="img-circle msgPic" alt="..."> <strong>JM Gula</strong></span>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<h1 style="text-align:center;">SOME MESSAGE HERE</h1>
						<h1 style="text-align:center;">SOME MESSAGE HERE</h1>
						<h1 style="text-align:center;">SOME MESSAGE HERE</h1>
					</div>
					<div class="modal-footer">
						<form action="" class="form-inline">
							<input type="text" class="pull-left" placeholder="Write a message..." style="width:85%;padding:5px;">
							<button type="Submit" class="btn btn-success">Send</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- END OF MODALS-->
		<!--JS-->
		<script src="resource/js/jquery-3.1.0.min.js"></script>
		<script src="resource/bootstrap/js/bootstrap.min.js"></script>
		<script>
      $(document).ready(function(){
        $("[data-hover='tooltip']").tooltip();
      });
    </script>
	</body>
</html>

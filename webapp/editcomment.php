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
		$postid = $_SESSION['postcommentid'];
		if($_SESSION['userid']){ //checks if user is logged in
		}
		else{
			header("location:indexv2.html"); // redirects if user is not logged in
		}
		$id = $_SESSION['userid']; //assigns user value
		$fname = $_SESSION['userfname'];
		$lname = $_SESSION['userlname'];
		$pic = $_SESSION['profpic'];
		$password = $_SESSION['pass'];
		$tablepostid = $_SESSION['postid'];
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

<!--Status-->
					<?php

/*

EDIT.PHP

Allows user to edit specific entry in database

*/



// creates the edit record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($commentid, $comment,  $error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>Edit Record</title>

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; margin-left: 15px; border:0px solid red; color:red; width:110%">'.$error.'</div>';

}

?>



<form action="" method="post">

<input type="hidden" name="commentid" value="<?php echo $commentid; ?>"/>

<div>



<div class="col-sm-7"  >
					<div class="modal-dialog">
						<div class="modal-content" style="margin-top:-30px;">
							<div class="modal-header"><h4><b>Edit Comment</b></h4></div>
							<div class="modal-body">
								
							</div>
							<div class="modal-footer">
									
	<textarea style="width:100%;  resize:none;" name="comment" required="required"><?php echo $comment;?></textarea>




<button type="submit" class="btn btn-success" name="submit" value="Submit">Save</button>

<a href="javascript:history.back()"><button type="button" class="btn btn-success"  value="cancel" >Cancel</button></a>


							</div>
						</div>
					</div>
				</div>



</form>
<div class="col-sm-2">
							<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftodayscarolinian%2F%3Ffref%3Dts&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
							<iframe class="marg" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fwarriorsturf%2F%3Ffref%3Dts&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
				</div>

<?php

}






// connect to the database

include('connect.php');



// check if the form has been submitted. If it has, process the form and save it to the database
if(isset($_POST['']))
{

}

if (isset($_POST['submit']))

{

// confirm that the 'id' value is a valid integer before getting the form data

if (is_numeric($_POST['commentid']))

{

// get form data, making sure it is valid

$commentid = $_POST['commentid'];

$comment = mysql_real_escape_string(htmlspecialchars($_POST['comment']));





// check that firstname/lastname fields are both filled in

if ($comment == '' )

{

// generate error message

$error = 'Please fill out this field.';



//error, display form

renderForm($commentid, $comment,  $error);

}

else

{

// save the data to the database

mysql_query("UPDATE comments SET comment='$comment' WHERE commentid='$commentid'")

or die(mysql_error());



// once saved, redirect back to the view page

Print '<script>window.location.assign("commentspage.php?id=' . $postid . '");</script>';

}

}

else

{

// if the 'id' isn't valid, display an error

echo 'Error!';

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['commentid']) && is_numeric($_GET['commentid']) && $_GET['commentid'] > 0)

{

// query db

$commentid = $_GET['commentid'];

$result = mysql_query("SELECT * FROM comments WHERE commentid=$commentid")

or die(mysql_error());

$row = mysql_fetch_array($result);



// check that the 'id' matches up with a row in the databse

if($row)

{



// get data from db

$comment = $row['comment'];




// show form

renderForm($commentid, $comment, '');

}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

}

}

?>
<div class="modal" id="viewPic" role="dialog">
      <div class="modal-dialog">>
          <div class="modal-content mView" id="viewPic2">
            <img src="resource/images/<?php Print $pic ?>" class="center-block">
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

<script src="resource/js/jquery-3.1.0.min.js"></script>
		<script src="resource/bootstrap/js/bootstrap.min.js"></script>
		<script>
      $(document).ready(function(){
        $("[data-hover='tooltip']").tooltip();
      });
    </script>
	</body>
</html>











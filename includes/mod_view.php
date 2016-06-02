<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';

sec_session_start();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-us">
<head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <!-- Title of webpage -->
                <title>Moderator Page</title>
                
                <!-- Reference to Stylesheet.css -->                
				<link rel="stylesheet" type="stylesheet.css" title="preferred"/>

                <!-- Bootstrap -->
                <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
				<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
               
			
</head>
<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
			<a class="navbar-brand" href="#">MonarchLife</a>
		</div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php include("../includes/navigation.php"); ?>
        </div>
     </div>
</nav> 



<div class= "container">
<div class = "panel panel-default">
<div class="panel-heading"><b><h4>Edit Profile</b></h4></div>
<div class="panel-body">
<?php
if(isset ($_SESSION['username'])){
        echo'<p>Hello '.htmlentities($_SESSION['fname']).', welcome to your profile!</p>';
		echo'<p> Username: '.htmlentities($_SESSION['username']).'</p>';		
		echo'<p> Name: '.htmlentities($_SESSION['fname']). ' '.htmlentities($_SESSION['mname']).' ' .htmlentities($_SESSION['lname']).'</p>';
		echo'<p> Date of Birth: ' .htmlentities($_SESSION['date_of_birth']). '</p>';
		echo'<p> College: ' .htmlentities($_SESSION['college']).'</p>';
		echo'<p> Academic Level: ' .htmlentities($_SESSION['academic_level']).'</p>';
}

?>

function setData()
{
	<?php
			$_SESSION['fname'] = "You";//$_POST['fname'];
			$_SESSION['lname'] = "Win";//$_POST['lname'];
	?>
}

<!--Testing the Input Text fields-->
<div class="profile-form">
	<b>[WIP] User Profile Edit:</b>
	<br>First Name:	<input type ="text" name="fname" id='fname'>
		Last Name: 	<input type ="text" name="lname" id='lname'></br>
		
<!-- Submit Button to edit information -->
	<form method="post" action="../editProfile.php">
	<input id="submit" onclick="setData()" name="submit" type="submit" value="Submit" class="btn btn-success">
	</form>
</div>

</div><!--end of panel body-->
</div>


	
	 
<br><a href= "moderator_page.php" class="btn btn-default" role="button">Back to Homepage</a></br>
</form>
</body>
</html>
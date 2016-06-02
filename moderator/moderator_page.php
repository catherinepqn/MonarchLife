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
				<link rel="stylesheet" type="../stylesheet.css" title="preferred"/>
				<link rel="stylesheet" type="text/css" href="menustyle.css">

                <!-- Bootstrap -->
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


<div id="container">

  <div id="leftbar">
  
  <br><br><br><br>
  <h4><p>USER MENU</p></h4>
  <br>
 
  <ul>
  <li><a id="profile" class="active" href="#"><span>Profile</span></a></li>
  <li><a id="events" href="user_events.php"><span>Events</span></a></li>
</ul>

<br><br>

<h4><p>MODERATOR MENU</p></h4>
<br>

<ul>
  <li><a id="man_events" href="manage_events.php"><span>Manage Events</span></a></li>
  <li><a id="con_providers" href="content_providers.php"><span>Content Providers</span></a></li>
  <li><a id="edit_resource" href="manageResource.php"><span>Edit Resource</span></a></li>
</ul>
<br><br>
 </div>
  


<div class= "container">
<div class = "panel panel-default">
<div class="panel-heading"><h4><b> Welcome!</b></h4></div>
<div class="panel-body">
<?php
//if moderator logins, do the following... 
if(isset ($_SESSION['username'])){
        echo'<p>Hello '.htmlentities($_SESSION['fname']).', you have logged in as a '.htmlentities($_SESSION['type']).' successfully!</p>';
		//echo'<p> Username: ' .htmlentities($_SESSION['username']).'</p>';
		echo "<strong> User Details:</strong>";
		//users name
		echo'<p>Name: '.htmlentities($_SESSION['fname']).' '.htmlentities($_SESSION['lname']).'</p>';
		//users rank
		if(!empty( $_SESSION['rank']))
			echo'<p>Rank: '.htmlentities($_SESSION['rank']).'</p>';
		//users monarchpoints
		echo'<p>MP: '.htmlentities($_SESSION['monarchpoints']).'</p>';
		//users pridepoints 
		echo'<p>PP: '.htmlentities($_SESSION['pridepoints']).'</p>';
}
?>

<!-- List of buttons -->
<br><a href= "/editProfile.php" class="btn btn-default" role="button"> Edit Profile</a></br>


</div><!--end of panel body-->
</div>



</body>
</html>

<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <!-- Title of webpage -->
                <title>Content Manager Page</title>
                
                <!-- Reference to Stylesheet.css -->                
				<link rel="stylesheet" type="stylesheet.css" title="preferred"/>
				<link rel="stylesheet" type="text/css" href="menustyle.css">

                <!-- Bootstrap -->
                <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
				<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

                <script> src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
			<?php include("includes/navigation.php"); ?>
        </div>
     </div>
</nav>	
<!--side bar-->
<div id="container">

  <div id="leftbar">
  
  <br><br><br><br>
  <h4><p>USER MENU</p></h4>
  <br>
 
  <ul>
  <li><a id="profile" class="active" href="#"><span>Profile</span></a></li>
  <li><a id="events" href="cm_user_events.php"><span>Events</span></a></li>
</ul>

<br><br>
<h4><p>CONTENT MANAGER MENU</p></h4>
<br>

<ul>
  <li><a id="man_events" href="cm_manage_events.php"><span>Manage Events</span></a></li>
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

		//events the user created
		echo "<table border='1'>
		<tr>
			<th>EventName</th>
			<th>EventDate</th>
			<th>EventTime</th>
			<th>Location</th>
			<th>Points</th>
		</tr>";
		
		echo"<br>";
		echo"<strong>Your Events:</strong>";
		$result = mysqli_query($mysqli,"SELECT * FROM event ORDER BY event_name ");
		while($row = mysqli_fetch_array($result)){
			if($row["manager_id"] == $_SESSION['user_id'] && $row["approved"] == 1){
			$eventName = $row["event_name"];
			$eventDate = $row["event"];
			$eventTime = $row["event_time"];
			$eventLoc  = $row["location"];
			$eventPoints = $row["points_worth"];
			echo "<tr><td>" .$eventName. "</td><td>" .$eventDate. "</td><td>" .$eventTime. "</td><td>"
				.$eventLoc. "</td><td>" .$eventPoints. "</td></tr>";
			}
		}
		echo "</table>";

		//register an event
		/*echo '<br><br>';
		echo'<form action="http://monarch-life.cs.odu.edu/eventRegistration.php">
			<input type="submit" value="Register Your Event">
		</form>';
		
		echo'<form action="http://monarch-life.cs.odu.edu/cm_edit_page.php">
			<input type="submit" value="Edit Profile">
		</form>';*/	
	
?>
	
<!-- Edit profile button -->
<br><a href="eventRegistration.php" class="btn btn-default" role="button">Register Your Event</a></br>
<br><a href= "editProfile.php" class="btn btn-default" role="button"> Edit Profile</a></br>

</div><!--end of panel body-->
</div>

</body>
</html>


<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-us">
<head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <!-- Title of webpage -->
                <title>Content Manager Page</title>
                
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
			<?php include("includes/navigation.php"); ?>
        </div>
     </div>
</nav>	
	


<div id="container">

  <div id="leftbar">
  
  <br><br><br><br>
  <h4><p>USER MENU</p></h4>
  <br>
 
  <ul>
  <li><a id="profile" href="content_man_page.php"><span>Profile</span></a></li>
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
<div class="panel-heading"><h4><b>Current Events</b></h4></div>
<div class="panel-body">


<div class="container">
	 
<?php
		echo "<table border='1' cellpadding='20'>";
			echo'<tr><td>Event</td><td>Date</td><td>Time</td><td>Location</td><td>Points</td><td>Event Provider</td><td>Edit Events</td></tr>';
			$result = mysqli_query($mysqli,"SELECT * FROM event, user WHERE user_id = manager_id AND approved='1' ORDER BY event");
			while($row = mysqli_fetch_array($result)){
				if($row["manager_id"] == $_SESSION['user_id'] && $row["approved"] == 1){
				echo '<tr>';
				$eventID = $row["event_id"];
				$eventName = $row["event_name"];
				$eventDate = $row["event"];
				$eventTime = $row["event_time"];
				$eventLoc  = $row["location"];
				$eventPoints = $row["points_worth"];
				$manFname = $row["fname"];
				$manLname = $row["lname"];				
				
				echo "<tr><td>" .$eventName. "</td><td>" .$eventDate. "</td><td>" .$eventTime. "</td><td>"
				.$eventLoc. "</td><td>" .$eventPoints. "</td><td>" .$manFname. ' ' .$manLname. "</td>";
				echo '<td><a class = "btn btn-info btn-block" aria-label="Edit" href="cm_edit_events.php?event_id='. $row['event_id'] . '"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>';
				echo '</tr>'; 
			}
		}	
	echo "</table>";


?>

	

	
			  
	</div> <!--End of container -->
		     
</div>


</div><!--end of panel body-->
</div>


</body>
</html>

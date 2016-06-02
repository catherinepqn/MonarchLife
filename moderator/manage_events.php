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
               
		



<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  .toggler {
    width: 500px;
    height: 200px;
  }
  #button {
    padding: .5em 1em;
    text-decoration: none;
  }
  #effect {
    position: relative;
    width: 240px;
    height: 135px;
    padding: 0.4em;
  }
  #effect h3 {
    margin: 0;
    padding: 0.4em;
    text-align: center;
  }
  </style>
  <script>
  $(function() {
    // run the currently selected effect
    function runEffect() {
      // get effect type from
      var selectedEffect = $( "#effectTypes" ).val();
 
      // most effect types need no options passed by default
      var options = {};
      // some effects have required parameters
      if ( selectedEffect === "scale" ) {
        options = { percent: 0 };
      } else if ( selectedEffect === "size" ) {
        options = { to: { width: 200, height: 60 } };
      }
 
      // run the effect
      $( "#effect" ).toggle( selectedEffect, options, 500 );
    };
 
    // set effect from select menu value
    $( "#button" ).click(function() {
      runEffect();
    });
  });
  </script>
			
			
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
  <li><a id="profile" href="moderator_page.php"><span>Profile</span></a></li>
  <li><a id="events" href="user_events.php"><span>Events</span></a></li>
</ul>

<br><br>

<h4><p>MODERATOR MENU</p></h4>
<br>

<ul>
  <li><a id="man_events" class="active" href="#"><span>Manage Events</span></a></li>
  <li><a id="con_providers" href="content_providers.php"><span>Content Providers</span></a></li>
    <li><a id="edit_resource" href="manageResource.php"><span>Edit Resource</span></a></li>
</ul>
<br><br>
 </div>
  


<div class= "container">
<div class = "panel panel-default">
<div class="panel-heading"><h4><b>Current Events</b></h4></div>
<div class="panel-body">





	 <div class="container">
	 
<?php
	 $rows = mysqli_query($mysqli,"SELECT * FROM event WHERE event >= cast((now()) as date) AND approved='0'");
	 
if ($rows) { 

    if($rows->num_rows === 0)
    {
        echo"<p><p><p><b>No Events Waiting Approval!</b></p>";
    }
    else
    {
	 echo "<p><p><p><b>Events Waiting Approval</b></p>";


			echo "<table border='1' cellpadding='20'>";
			echo'<tr><td>Event</td><td>Date</td><td>Time</td><td>Location</td><td>Points</td><td>Event Provider</td><td>Approve Event</td><td>Delete Event</td></tr>';
			$result = mysqli_query($mysqli,"SELECT * FROM event, user WHERE user_id = manager_id AND event >= cast((now()) as date) AND approved='0' ORDER BY event");
			while($row = mysqli_fetch_array($result)){
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
				echo '<td><a class = "btn btn-success btn-block" aria-label="Add" href="eventApprove.php?event_id='. $row['event_id'] . '"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
				echo '<td><a class = "btn btn-danger btn-block" aria-label="Delete" href="eventDelete.php?event_id='. $row['event_id'] . '"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
				echo '</tr>'; 
			}

	echo "</table>";
	
	} 	
	
echo "<br><br>";


echo "<p><p><p><b>All Approved Events</b></p>";


			echo "<table border='1' cellpadding='20'>";
			echo'<tr><td>Event</td><td>Date</td><td>Time</td><td>Location</td><td>Points</td><td>Event Provider</td><td>Edit Events</td><td>Delete Event</td></tr>';
			$result = mysqli_query($mysqli,"SELECT * FROM event, user WHERE user_id = manager_id AND approved='1' ORDER BY event");
			while($row = mysqli_fetch_array($result)){
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
				echo '<td><a class = "btn btn-info btn-block" aria-label="Edit" href="editEvents.php?event_id='. $row['event_id'] . '"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>';
				echo '<td><a class = "btn btn-danger btn-block" aria-label="Delete" href="eventDelete.php?event_id='. $row['event_id'] . '"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
				echo '</tr>'; 
			}
			
	echo "</table>";

	

}
?>

	

	
			  
	</div> <!--End of container -->
		     
</div>


</div><!--end of panel body-->
</div>


</body>
</html>

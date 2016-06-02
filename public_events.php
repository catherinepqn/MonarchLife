<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-us">
<head>
	<!--Title of Website-->
	<title>Public Events</title>

	<!--Metadata tags-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--Link to css stylesheet-->
	<link rel="stylesheet" type="text/css" href="stylesheet.css" title="preferred">

	<!-- bootstrap -->
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
         <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>	 
		 
<style>
#eventlist {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#eventlist td, #eventlist th {
    border: 1px solid #ddd;
    text-align: left;
    padding: 8px;
}

#eventlist tr:nth-child(even){background-color: #f2f2f2}

#eventlist th {
    padding-top: 12px;
    padding-bottom: 12px;
    background-color: #6A6A94;
    color: white;
}
</style>		 
		 
		 
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
<div class="container">
  <h2>Upcoming Events</h2>
  <div class="row">

<?php
$result = mysqli_query($mysqli,"SELECT * FROM event, user WHERE user_id = manager_id AND event >= cast((now()) as date) AND public='1' AND approved='1' ORDER BY event");
 while($row = mysqli_fetch_array($result)){
                                $eventName = $row["event_name"];
                                $eventDate = $row["event"];
                                $eventTime = $row["event_time"];
                                $eventLoc  = $row["location"];
                                $eventPoints = $row["points_worth"];
								$manFname = $row["fname"];
								$manLname = $row["lname"];
								$eventType = $row["event_type"];
                                echo '<div class="col-sm-4 event">';
                                echo '<div class="thumbnail">';
                                echo '<div class="overlay"></div>';								
								if ($eventType == 'Career'){
								echo '<img class="img-responsive" alt="alternative text" src="/images/Events/Career.jpg">';}
								else if ($eventType == 'Athletic'){
								echo '<img class="img-responsive" alt="alternative text" src="/images/Events/Athletic.jpg">';}
								else if ($eventType == 'Academic'){
								echo '<img class="img-responsive" alt="alternative text" src="/images/Events/Academic.jpeg">';}
								else if ($eventType == 'Meeting'){
								echo '<img class="img-responsive" alt="alternative text" src="/images/Events/Meeting.jpg">';}
								else if ($eventType == 'Party'){
								echo '<img class="img-responsive" alt="alternative text" src="/images/Events/Party.jpg">';}
								else{
								echo '<img class="img-responsive" alt="alternative text" src="/images/Events/Other.jpg">';}						
                                echo ' </div>';
                                echo '<span class="label label-info date">' .$eventDate. '</span>'; echo '  ';
                                echo '<span class="label label-info date"> Monarch Points: ' .$eventPoints. '</span>'; echo '  ';
								echo '<span class="label label-danger"> Manager: ' .$manFname. ' ' .$manLname. '</span>';
                                echo '<p>';
                                echo '<strong>' .$eventName. '</strong><br>';
                                echo '<em>' .$eventLoc. '</em><br>';
                                echo '<span class="small">' .$eventTime. '</span>';
                                echo '</p>';
                                echo '</div>';

                        }



?>
</div>
</div>
<br>
<br>

</body>
</html>

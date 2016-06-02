<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
include_once '../includes/psl-config.php';

sec_session_start();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-us">
<head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <!-- Title of webpage -->
                <title>Edit Event</title>
                
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


<!-- put it in a nice box-->
<div class= "container">
<div class = "panel panel-default">
<div class="panel-heading"><b><h4>Edit Event</b></h4></div>
<div class="panel-body">

<?php

 if (isset($_GET['event_id']) && is_numeric($_GET['event_id']) && $_GET['event_id'] > 0)
 {
	// query db
	$id = $_GET['event_id'];
	$_SESSION['event_id'] = $id;
	$result = mysqli_query($mysqli, 'SELECT * FROM event WHERE event_id='.$id) or die("You messed up"); 
	$row = mysqli_fetch_array($result);
	 
	// check that the 'id' matches up with a row in the databse
	if(isset($row))
	{
		// get data from db
		$_SESSION['event_name'] = $row['event_name'];
		$_SESSION['event'] = $row['event'];
		$_SESSION['event_time'] = $row['event_time'];
		$_SESSION['location'] = $row['location'];
		$_SESSION['points_worth'] = $row['points_worth'];
	 }
	 
 }

//show user current information
 if (isset($row)){
	
        echo'<p>Current Information:</p>';
		echo'<p> Event Name: '.htmlentities($_SESSION['event_name'] ).'</p>';		
		echo'<p> Date: '.htmlentities($_SESSION['event']). '</p>';
		echo'<p> Time: ' .htmlentities($_SESSION['event_time'] ). '</p>';
		echo'<p> Location: '.htmlentities($_SESSION['location'] ).'</p>';		
		echo'<p> Points Worth: '.htmlentities($_SESSION['points_worth']). '</p>';
}
?>

<!--Input Text fields-->
	<b>Edit the Information:</b>
	<form action="editEvents.php" method = "post">
	<br>Event Name:		<input type ="text" name="event_name" value = "<?php echo $_SESSION['event_name'] ?>"></br>
	<br>Date: 			<input type="text" name="event" value = "<?php echo $_SESSION['event'] ?>"></br>
	<br>Time: 			<input type ="text" name="event_time" value = "<?php echo $_SESSION['event_time'] ?>"></br>
	<br>Location: 			<input type="text" name="location" value = "<?php echo $_SESSION['location'] ?>"></br>
	<br>Points Worth: 		<input type ="text" name="points_worth" value = "<?php echo $_SESSION['points_worth'] ?>"></br>
	
	
<!-- Submit Button to edit information -->
	<input id="submit" name="submit" type="submit" value="Submit" class="btn btn-success">
	</form>		

<!-- Edits user information, stores it into database and refreshes page.-->
<?php
	if(!empty($_POST['submit']))
	{	//will check for post matching the variable name given
		$_SESSION['event_name'] = $_POST['event_name'];
		$_SESSION['event'] = $_POST['event'];
		$_SESSION['event_time'] = $_POST['event_time'];
		$_SESSION['location'] = $_POST['location'];
		$_SESSION['points_worth'] =$_POST['points_worth'];
		
		//assigning session values to temporary variables
		$id = $_SESSION['event_id'];
		$event_name = $_SESSION['event_name'];
		$event = $_SESSION['event'];
		$event_time =$_SESSION['event_time'];
		$location=$_SESSION['location'];
		$points_worth=$_SESSION['points_worth'];
	

		//adds the information to the database
		$sql = "UPDATE event SET event_name = '$event_name', event = '$event',event_time ='$event_time', location='$location',points_worth='$points_worth' WHERE event_id = '$id'"; 
		$mysqli->query($sql) or die ("Something went wrong.");
		//refreshes the page
		header("Location: editEvents.php?event_id=$id");

	}
?>


</div><!--end of panel body-->
</div>

 
<br><a href= "/index.php" class="btn btn-default" role="button">Back to Homepage</a></br>


</body>
</html>
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
  <li><a id="profile" href="moderator_page.php"><span>Profile</span></a></li>
  <li><a id="events" href="user_events.php"><span>Events</span></a></li>
</ul>

<br><br>

<h4><p>MODERATOR MENU</p></h4>
<br>

<ul>
  <li><a id="man_events" href="manage_events.php"><span>Manage Events</span></a></li>
  <li><a id="con_providers" class="active" href="#"><span>Content Providers</span></a></li>
  <li><a id="edit_resource" href="manageResource.php"><span>Edit Resource</span></a></li>
</ul>
<br><br>
 </div>
  


  
<div class= "container">
<div class = "panel panel-default">
<div class="panel-heading"><h4><b> List of Users</b></h4></div>
<div class="panel-body">


<div class="container">

<?php
	// connect to the database

	// get results from database
	$result = mysqli_query($mysqli, "SELECT * FROM user") 
		or die(mysqli_error($mysqli));  
		
	// display data in table
	echo "<strong>List of content managers:</strong>";
	echo "<table border='1' cellpadding='20'>";
	echo'<tr><td>User ID</td><td>Username</td><td>Last Name</td><td>First Name</td><td>Middle Name</td><td>E-mail</td><td>Type</td><td>Rank</td><td>Monarch Points</td><td>Pride Points</td><td>Remove Permissions</td></tr>';

	// loop through results of database query, displaying them in the table
	while($row = mysqli_fetch_array( $result )) {
		
		if($row['type'] == 'content_manager')
		{
			// echo out the contents of each row into a table
			echo '<tr>';
			echo '<td>'.$row["user_id"].'</td>';
			echo '<td>'.$row["username"].'</td>';
			echo '<td>'.$row["lname"].'</td>';
			echo '<td>'.$row["fname"].'</td>';
			echo '<td>'.$row["mname"].'</td>';
			echo '<td>'.$row["email"].'</td>';
			echo '<td>'.$row["type"].'</td>';
			echo '<td>'.$row["rank"].'</td>';
			echo '<td>'.$row["monarchpoints"].'</td>';
			echo '<td>'.$row["pridepoints"].'</td>';
			echo '<td><a class = "btn btn-danger btn-block" aria-label="Delete" href="removeCM.php?username='. $row['username'] . '"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
			echo '</tr>'; 
		}
	} 

	// close table>
	echo "</table>";
	
	// get results from database
	$result = mysqli_query($mysqli, "SELECT * FROM user") 
		or die(mysqli_error($mysqli));  
	
	echo"<br><br>";
	echo "<strong>List of regular users:</strong>";	
	echo "<table border='1' cellpadding='20'>";
	echo'<tr><td>User ID</td><td>Username</td><td>Last Name</td><td>First Name</td><td>Middle Name</td><td>E-mail</td><td>Type</td><td>Rank</td><td>Monarch Points</td><td>Pride Points</td><td>Add Permissions</td></tr>';

	// loop through results of database query, displaying them in the table
	while($row = mysqli_fetch_array( $result )) {
		
		if($row['type'] == 'student')
		{
			// echo out the contents of each row into a table
			echo '<tr>';
			echo '<td>'.$row["user_id"].'</td>';
			echo '<td>'.$row["username"].'</td>';
			echo '<td>'.$row["lname"].'</td>';
			echo '<td>'.$row["fname"].'</td>';
			echo '<td>'.$row["mname"].'</td>';
			echo '<td>'.$row["email"].'</td>';
			echo '<td>'.$row["type"].'</td>';
			echo '<td>'.$row["rank"].'</td>';
			echo '<td>'.$row["monarchpoints"].'</td>';
			echo '<td>'.$row["pridepoints"].'</td>';
			echo '<td><a class = "btn btn-success btn-block" aria-label="Add" href="addCM.php?username='. $row['username'] . '"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
			echo '</tr>'; 
		}
	} 

	// close table>
	echo "</table>";
?>

</div>


</div><!--end of panel body-->
</div>



</body>
</html>

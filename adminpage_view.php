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
                <title>View Users</title>
				
	<link rel="stylesheet" type="text/css" href="menustyle.css">

	
   <!-- bootstrap -->
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
         <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		 
		 	<link rel="stylesheet" type="text/css" href="stylesheet.css" title="preferred">
		 
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
  <li><a id="profile" href="index.php"><span>Profile</span></a></li>
  <li><a id="events" href="admin_user_events.php"><span>Events</span></a></li>
</ul>

<br><br>

<h4><p>ADMINISTRATOR MENU</p></h4>
<br>

<ul>
  <li><a id="man_events" class="active" href="#"><span>Manage Users</span></a></li>
</ul>
<br><br>
 </div>
  
<div class= "container">
<div class = "panel panel-default">
<div class="panel-heading"><h4><b> List of Users</b></h4></div>
<div class="panel-body">


<?php
	// connect to the database

	// get results from database
	$result = mysqli_query($mysqli, "SELECT * FROM user") 
		or die(mysqli_error($mysqli));  
		
	// display data in table
	echo '<p><b>View All</b> | <a class = "btn btn-default" href="adminpage_view_paginated.php?page=1">View Paginated</a></p> <p><a class = "btn btn-success" href="privileged_register.php">Add New User</a></p>';
	
	echo "<table border='1' cellpadding='10'>";
	echo'<tr><td>User ID</td><td>Username</td><td>Last Name</td><td>First Name</td><td>Middle Name</td><td>E-mail</td><td>Type</td><td>Permission</td><td>Rank</td><td>Monarch Points</td><td>Pride Points</td></tr>';

	// loop through results of database query, displaying them in the table
	while($row = mysqli_fetch_array( $result )) {
		
		// echo out the contents of each row into a table
		echo '<tr>';
           echo '<td>'.$row["user_id"].'</td>';
           echo '<td>'.$row["username"].'</td>';
           echo '<td>'.$row["lname"].'</td>';
           echo '<td>'.$row["fname"].'</td>';
           echo '<td>'.$row["mname"].'</td>';
           echo '<td>'.$row["email"].'</td>';
           echo '<td>'.$row["type"].'</td>';
           echo '<td>'.$row["permission"].'</td>';
           echo '<td>'.$row["rank"].'</td>';
           echo '<td>'.$row["monarchpoints"].'</td>';
           echo '<td>'.$row["pridepoints"].'</td>';
		   echo '<td><a class = "btn btn-info" aria-label="Edit" href="adminpage_edit.php?id='. $row['user_id'] . '"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>';
		   echo '<td><a class = "btn btn-danger" aria-label="Delete" href="adminpage_delete.php?id='. $row['user_id'] . '"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
		echo '</tr>'; 
	} 

	// close table>
	echo "</table>";
?>


</div>
</div>
</div>

</body>
</html>	
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
                <title>View users - Paginated</title>
				
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
	// number of results to show per page
	$per_page = 10;
	
	// figure out the total pages in the database
	$result = mysqli_query($mysqli, "SELECT * FROM user") 
		or die(mysqli_error($mysqli));  
	$total_results = mysqli_num_rows($result);
	$total_pages = ceil($total_results / $per_page);

	// check if the 'page' variable is set in the URL (ex: view-paginated.php?page=1)
	if (isset($_GET['page']) && is_numeric($_GET['page']))
	{
		$show_page = $_GET['page'];
		
		// make sure the $show_page value is valid
		if ($show_page > 0 && $show_page <= $total_pages)
		{
			$start = ($show_page -1) * $per_page;
			$end = $start + $per_page; 
		}
		else
		{
			// error - show first set of results
			$start = 0;
			$end = $per_page; 
		}		
	}
	else
	{
		// if page isn't set, show first set of results
		$start = 0;
		$end = $per_page; 
	}
	
	// display pagination
	echo '<p>';
	echo '<a class = "btn btn-default"  href="adminpage_view.php">View All</a>|View Page:';

	
	for ($i = 1; $i <= $total_pages; $i++)
	{
		echo '<a class = "btn btn-default" href= "adminpage_view_paginated.php?page='.$i.'">'.$i.'</a>';
	}
	echo '</p>  <p><a class = "btn btn-success" href="privileged_register.php">Add New User</a></p>';
		
	// display data in table
	echo "<table border='1' cellpadding='10'>";
	echo'<tr><td>User ID</td><td>Username</td><td>Last Name</td><td>First Name</td><td>Middle Name</td><td>E-mail</td><td>Type</td><td>Permission</td><td>Rank</td><td>Monarch Points</td><td>Pride Points</td></tr>';

	// loop through results of database query, displaying them in the table	
	for ($i = $start; $i < $end; $i++)
	{
		// make sure that PHP doesn't try to show results that don't exist
		if ($i == $total_results) { break; }
	
		// echo out the contents of each row into a table
		echo '<tr>';
           echo '<td>'.mysqli_result($result, $i, 'user_id').'</td>';
		   echo '<td>'.mysqli_result($result, $i, 'username').'</td>';
		   echo '<td>'.mysqli_result($result, $i, 'lname').'</td>';
		   echo '<td>'.mysqli_result($result, $i, 'fname').'</td>';
		   echo '<td>'.mysqli_result($result, $i, 'mname').'</td>';
		   echo '<td>'.mysqli_result($result, $i, 'email').'</td>';
		   echo '<td>'.mysqli_result($result, $i, 'type').'</td>';
		   echo '<td>'.mysqli_result($result, $i, 'permission').'</td>';
		   echo '<td>'.mysqli_result($result, $i, 'rank').'</td>';
		   echo '<td>'.mysqli_result($result, $i, 'monarchpoints').'</td>';
		   echo '<td>'.mysqli_result($result, $i, 'pridepoints').'</td>';
		   echo '<td><a class = "btn btn-info" aria-label="Edit" href="adminpage_edit.php?id='.mysqli_result($result, $i, 'user_id').'"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>';
		   echo '<td><a class = "btn btn-danger" aria-label="Delete" href="adminpage_delete.php?id='.mysqli_result($result, $i, 'user_id').'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
		echo '</tr>'; 
	}
	// close table>
	echo "</table>"; 
	
	// pagination
	
?>

</div>
</div>
</div>

</body>
</html>
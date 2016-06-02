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
  <li><a id="con_providers" href="content_providers.php"><span>Content Providers</span></a></li>
  <li><a id="edit_resource" class="active" href="#"><span>Edit Resource</span></a></li>
</ul>
<br><br>
 </div>
 
 <div class= "container">
<div class = "panel panel-default">
<div class="panel-heading"><b><h4>Edit Resources</b></h4></div>
<div class="panel-body">
	<table>
	
	<?php
			$result = mysqli_query($mysqli,"SELECT * FROM resource ORDER BY resource_name");
			echo "<table border='1'>";
			echo'<tr><td>Resource Name</td><td>Address</td><td>Link</td><td>Edit Resource</td><td>Delete Resource</td></tr>';
			while($row = mysqli_fetch_array($result)){
				$resourceName = $row["resource_name"];
				$address = $row["address"];
				$resourceLink = $row["link"];
				
				echo "<tr><td>" .$resourceName. "</td><td>" .$address. "</td><td>" .$resourceLink. "</td>";	
				echo '<td><a class = "btn btn-info btn-block" aria-label="Edit" href="editResource.php?resource_id='. $row['resource_id'] . '"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>';
				echo '<td><a class = "btn btn-danger btn-block" aria-label="Delete" href="deleteResource.php?resource_id='. $row['resource_id'] . '"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
				echo '</tr>'; 				
			}
	?>
	</table>
			  
	</div> <!--End of container -->
		
</div><!--end of panel body-->
</div>
</div>

</body>
</html>

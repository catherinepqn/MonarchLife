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
                <title>Edit Resource</title>
                
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
<div class="panel-heading"><b><h4>Edit Resource</b></h4></div>
<div class="panel-body">

<?php

 if (isset($_GET['resource_id']) && is_numeric($_GET['resource_id']) && $_GET['resource_id'] > 0)
 {
	// query db
	$id = $_GET['resource_id'];
	$_SESSION['resource_id'] = $id;
	$result = mysqli_query($mysqli, 'SELECT * FROM resource WHERE resource_id='.$id) or die(mysqli_error(mysqli)); 
	$row = mysqli_fetch_array($result);
	 
	// check that the 'id' matches up with a row in the databse
	if(isset($row))
	{
		// get data from db
		$_SESSION['resource_name'] = $row['resource_name'];
		$_SESSION['address'] = $row['address'];
		$_SESSION['link'] = $row['link'];
	 }
	 
 }

//show user current information
 if (isset($row)){
	
        echo'<p>Current Information:</p>';
		echo'<p> Resource Name: '.htmlentities($_SESSION['resource_name'] ).'</p>';		
		echo'<p> Address: '.htmlentities($_SESSION['address']). '</p>';
		echo'<p> Web Address: ' .htmlentities($_SESSION['link'] ). '</p>';
}
?>

<!--Input Text fields -->
	<b>Edit the Information:</b>
	<form action="editResource.php" method = "post">
	<br>Resource Name:		<input type ="text" name="resource_name" value = "<?php echo $_SESSION['resource_name'] ?>"></br>
	<br>Address: 			<input type="text" name="address" value = "<?php echo $_SESSION['address'] ?>"></br>
	<br>Web Address: 		<input type ="text" name="link" value = "<?php echo $_SESSION['link']  ?>"></br>
	
<!-- Submit Button to edit information -->
	<input id="submit" name="submit" type="submit" value="Submit" class="btn btn-success">
	</form>		
<!-- Edits user information, stores it into database and refreshes page.-->
<?php
	if(!empty($_POST['submit']))
	{	
		$_SESSION['resource_name'] = $_POST['resource_name'];
		$_SESSION['address'] = $_POST['address'];
		$_SESSION['link'] = $_POST['link'];
		//will check for post matching the variable name given
		$id = $_SESSION['resource_id'];
		$resource_name = $_SESSION['resource_name'];
		$address = $_SESSION['address'];
		$link = $_SESSION['link'];
		
		//adds the information to the database
		$sql = "UPDATE resource SET resource_name = '$resource_name', address = '$address',link ='$link' WHERE resource_id = '$id'"; 
		$mysqli->query($sql) or die ("Something went wrong.");
		//refreshes the page
		header("Location: editResource.php?resource_id=$id");

	}
?>


</div><!--end of panel body-->
</div>

 
<br><a href= "manageResource.php" class="btn btn-default" role="button">Back to Homepage</a></br>


</body>
</html>
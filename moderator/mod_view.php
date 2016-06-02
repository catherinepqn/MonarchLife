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
                <title>Edit Profile</title>
                
                <!-- Reference to Stylesheet.css -->                
				<link rel="stylesheet" type="stylesheet.css" title="preferred"/>
				<link rel="stylesheet" type="text/css" href="menustyle.css"/>
				
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


<div id="container">

  <div id="leftbar">
  
  <br></br><br></br>
  <h4><p>USER MENU</p></h4>
  <br></br>
 
  <ul>
  <li><a id="profile" class="active" href="#"><span>Profile</span></a></li>
  <li><a id="events" href="user_events.php"><span>Events</span></a></li>
</ul>

<br></br>

<h4><p>MODERATOR MENU</p></h4>
<br></br>

<ul>
  <li><a id="man_events" href="manage_events.php"><span>Manage Events</span></a></li>
  <li><a id="con_providers" href="content_providers.php"><span>Content Providers</span></a></li>
  <li><a id="edit_resource" href="manageResource.php"><span>Edit Resource</span></a></li>
</ul>
<br></br>
 </div>
</div>

<!-- put it in a nice box-->
<div class= "container">
<div class = "panel panel-default">
<div class="panel-heading"><b><h4>Edit Profile</b></h4></div>
<div class="panel-body">

<?php
//show user current information
if(isset ($_SESSION['username'])){
	
        echo'<p><strong>Current Information:</strong></p>';
		echo'<p> Username: '.htmlentities($_SESSION['username']).'</p>';		
		echo'<p> Name: '.htmlentities($_SESSION['fname']). ' '.htmlentities($_SESSION['mname']).' ' .htmlentities($_SESSION['lname']).'</p>';
		//echo'<p> E-mail:'.htmlentities($_SESSION['email']). '</p>';
		echo'<p> Date of Birth: ' .htmlentities($_SESSION['date_of_birth']). '</p>';
		echo'<p> College: '.htmlentities($_SESSION['college']).'</p>';
		echo'<p> Academic Level: '.htmlentities($_SESSION['academic_level']).'</p>';	

}

?>

<!--Input Text fields-->
	<b>Edit Your Information:</b>
	<form action="mod_view.php" method = "post">
	<br>First Name:			<input type ="text" name="fname" value = "<?php echo $_SESSION['fname'] ?>">
		Middle Name: 		<input type="text" name="mname" value = "<?php echo $_SESSION['mname'] ?>">
		Last Name: 			<input type="text" name="lname" value = "<?php echo $_SESSION['lname'] ?>"></br>
	<br>Date of Birth:		<input type="text" name="date_of_birth" value = "<?php echo $_SESSION['date_of_birth'] ?>"></br>
	<br>College:			<input type ="text" name="college" value = "<?php echo $_SESSION['college'] ?>"></br>
	<br>New Password:		<input type ="password" name="password1"></br>
	<br>Confirm Password:	<input type ="password" name="password2"></br>
	
<!-- Submit Button to edit information -->
	<input id="submit" name="submit" type="submit" value="Submit" class="btn btn-success">
	</form>		

<!-- Edits user information, stores it into database and refreshes page.-->
<?php
	if(!empty($_POST['submit']))
	{	//will check for post matching the variable name given
		$_SESSION['fname'] = $_POST['fname'];
		$_SESSION['mname'] = $_POST['mname'];
		$_SESSION['lname'] = $_POST['lname'];
		$_SESSION['date_of_birth']= $_POST['date_of_birth'];
		$_SESSION['college'] = $_POST['college'];
		
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		if($password1 == $password2 && !(empty($password1) || empty($password2)))
		{
			$_SESSION['password'] = $password1;
			//assigning session values to temporary variables
			$username = $_SESSION['username'];
			$fname = $_SESSION['fname'];
			$mname =$_SESSION['mname'];
			$lname = $_SESSION['lname'];
			$date_of_birth=$_SESSION['date_of_birth'];
			$college=$_SESSION['college'];
		
			$password=$_SESSION['password'];
			$password = hash('sha1', $password);
		
			//adds the information to the database
			$sql = "UPDATE user SET fname = '$fname',mname = '$mname',lname ='$lname',
			date_of_birth='$date_of_birth',college='$college', password='$password' WHERE username ='$username'"; 
			$mysqli->query($sql) or die ("Something went wrong.");
			//refreshes the page
			header("Refresh:0");
		}
		else if( empty($password1) && empty($password2))
		{
			//assigning session values to temporary variables
			$username = $_SESSION['username'];
			$fname = $_SESSION['fname'];
			$mname =$_SESSION['mname'];
			$lname = $_SESSION['lname'];
			$date_of_birth=$_SESSION['date_of_birth'];
			$college=$_SESSION['college'];
			//adds the information to the database
			$sql = "UPDATE user SET fname = '$fname',mname = '$mname',lname ='$lname',
			date_of_birth='$date_of_birth',college='$college' WHERE username ='$username'"; 
			$mysqli->query($sql) or die ("Something went wrong.");
			//refreshes the page
			header("Refresh:0");
		}
		else if($password1 != $password2)
		{
			echo "Passwords don't match!";
		}
	}
?>


</div><!--end of panel body-->
</div>
</div>
 
<br><a href= "/index.php" class="btn btn-default" role="button">Back to Homepage</a></br>


</body>
</html>
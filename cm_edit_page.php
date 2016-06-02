<?php
include_once 'includes/cm_edit_page.inc.php';
include_once 'includes/functions.php';


sec_session_start();
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Title of webpage -->
		<title>Student Page</title>
		
		<!-- bootstrap -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
         <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
         
		<!--possible link to css style sheet-->
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

    <form action="<?php echo esc_url($_SERVER['PHP_SELF']);?>"
        method = "post"
        name="registration_form">
	<center>
         <div class="auto-style3">
			 Email:<input type='varchar(50)' name='email' id='email' /><br>
			 First Name:&nbsp;<input type="varchar(30)" name="fname" id="fname" /><br>
			 Middle Name:<input type="varchar(30)" name="mname" id="mname" /><br>
			 Last Name:<input type="varchar(30)" name="lname" id="lname"/><br>
			 Username:<input type="varchar(32)" name="username" id="username"/><br>
			 Password:<input type="" name="password" id="passwrod"/><br>
			 Date of Birth:<input type="date" name="date_of_birth" id="date_of_birth"/><br>
			 Your User ID:<input type="int(11)" name="user_id" id="user_id"/><br>
    	</div>
            <div class="auto-style3">
            <input type="submit" value="Update Information" /> 
    </div>	
	<p>Return to the <a href="content_man_page.php"> home page</a>.</p></center>
	</form>
	
	
	
</body>
</html>
<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';

$error = filter_input(INPUT_GET, 'error', $filter = FILTER_SANITIZE_STRING);
sec_session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Privileged Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="menustyle.css">
	
   <!-- bootstrap -->
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
         <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		 
		 	<link rel="stylesheet" type="text/css" href="stylesheet.css" title="preferred">
			<link rel="stylesheet" type="text/css" href="./registerstyle/registerstyle.css">
		 
</head>
<body>
<?php if (isset($_GET['error'])) : ?>
        <p class="error"><?php echo $error;?></p>
        <?php endif; ?>	
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
                        <a class="navbar-brand" href="#">Monarch Life</a>
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
  <li><a id="events" href="user_events.php"><span>Events</span></a></li>
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
<div class="panel-heading"><h4><b> Create Priviled User</b></h4></div>
<div class="panel-body">
	
    <?php if (!empty($error_msg)) {
        echo $error_msg;
    }
    ?>
<center> <div class="login-card" center>
<!--BEGIN #signup-form -->
    <div id="signup-form">

        <!--BEGIN #subscribe-inner -->
        <div id="signup-inner">

   <p>Usernames may contain only digits, upper and lowercase letters.<br>
      Emails must have a valid email format.<br>
      Passwords must be at least 4 characters long.<br>
    </p>
    <form action="<?php echo esc_url($_SERVER['PHP_SELF']);?>"
        method = "post"
        name="privileged_registration_form" id="privileged_registration_form">

         <p><label for="username">Username:</label>
	 <input style="width:60%;" type="text" name="username" id="username" /></p><br>

	<p><label for="email">Email:</label>
         <input style="width:60%;" type="text" name="email" id="email" /></p><br>

	<p><label for="password">Password:</label>
         <input style="width:60%;" type="password" name="password" id="password"/></p><br>

	<p><label for="fname">First Name:</label>
         <input style="width:60%;" type="text" name="fname" id="fname"/></p><br>

	<p><label for="lname">Last Name:</label>
         <input style="width:60%;" type= "text" name="lname" id="lname"/></p><br>
	<input type="hidden" name="privileged_registration_form" id="privileged_registration_form" value="privileged_registration_form"/>
         Type: <select id="type" name="type"  style="float:center;font-size:1em" >
		<option value="content_manager">Content Manager</option>
		<option value="moderator">Moderator</option>
		<option value="administrator">Administrator</option>
                </select><br><br>
               <p><button name="submit" type="submit">Register</button></p><br>
    </form>
<p><a class = "btn btn-default" href="adminpage_view.php">Return</a></p>
<!--END #signup-inner -->
        </div>

    <!--END #signup-form -->
    </div>

    </div><!--END of login card -->
	
</div>
</div>
</div>	
	
</body>
</html>

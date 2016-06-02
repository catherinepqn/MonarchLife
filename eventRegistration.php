<?php
include_once 'includes/eventRegistration.inc.php';
include_once 'includes/functions.php';

sec_session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Event Registration Form</title>
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
  <li><a id="profile" class="active" href="#"><span>Profile</span></a></li>
  <li><a id="events" href="cm_user_events.php"><span>Events</span></a></li>
</ul>

<br><br>
<h4><p>CONTENT MANAGER MENU</p></h4>
<br>

<ul>
  <li><a id="man_events" href="cm_manage_events.php"><span>Manage Events</span></a></li>
</ul>
<br><br>
 </div>	
	

<div class= "container">
<div class = "panel panel-default">
<div class="panel-heading"><h4><b> Create New Event</b></h4></div>
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
		
		<p>Please enter date MM/DD/YY<br>
      Please enter time HH:MM AM/PM
    </p>

    <form action="<?php echo esc_url($_SERVER['PHP_SELF']);?>"
        method = "post"
        name="registration_form" id="registration_form">
		
		<p><label for="manID">Manager ID</label>
	 <input style="width:60%;" type="int(4)" name="manager_id" id="manager_id" value="<?php echo $_SESSION['user_id'] ?>" readonly/></p><br>
		
		<p><label for="eName">Event Name</label>
	 <input style="width:60%;" type="mediumtext" name="event_name" id="event_name" /></p><br>
	 
	 <p><label for="eDate">Event Date</label>
	 <input style="width:60%;" type="date" name="event" id="event" /></p><br>
	 
	 <p><label for="eTime">Event Time</label>
	 <input style="width:60%;" type="time" name="event_time" id="event_time" /></p><br>
	 
	 <p><label for="eLoc">Event Location</label>
	 <input style="width:60%;" type="varchar(50)" name="location" id="location" /></p><br>
	 
	 <p><label for="eType">Event Type</label>
	 <input style="width:60%;" type="varchar(50)" name="event_type" id="event_type" /></p><br>
	 
	 <p><label for="ePoints">Event Points</label>
	 <input style="width:60%;" type="int(4)" name="points_worth" id="points_worth" /></p><br>	

<input type="hidden" name="registration_form" id="registration_form" value="registration_form"/>	 
	
	<p><button name="submit" type="submit">Register Event</button></p><br>
 

 </form>
<p><a class = "btn btn-default" href="content_man_page.php">Return</a></p>
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

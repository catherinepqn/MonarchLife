<?php
include_once 'includes/eventRegistration.inc.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-us">
<head>
	<!--Title of Website-->
	<title>Event Registration Successful</title>

	<!--Metadata tags-->
	<meta name="viewport" content="width=device-width, initial- scale=1.0">

	<!--Link to css style sheet-->
	<link rel="stylesheet" type="text/css" href="stylesheet.css" title="preferred">
	<link rel="stylesheet" type="text/css" href="menustyle.css">
	
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

	<center>
	<br>	  
		<h4><strong>You've successfully registered your event!</strong></h4> <br>
			 
			 <p><a class = "btn btn-default" href="content_man_page.php">Return</a></p>
			 
</center>
</div>
</div>
</div>

</body>
</html>

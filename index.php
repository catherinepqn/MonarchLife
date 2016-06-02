<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if(login_check($mysqli) == true) {
	$logged = 'in';
	header('Location: protected_page.php');
} else {
	$logged = 'out';
}
ini_set('display_errors','On');
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-us">
<head>
    <!--Title of Website-->
    <title>Welcome to MonarchLife</title>

    <!--Metadata tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- bootstrap -->
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
         <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
         
    <!--possible link to css style sheet-->
  <link rel="stylesheet" type="text/css" href="stylesheet.css" title="preferred"> 
</head>

<body>
<?php
if(isset($_GET['error'])) {
	echo '<p class="error">Error Logging In!</p>';
}
?>
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
	 <div class="jumbotron">
<center>	<h1> Welcome To MonarchLife</h1></Center> 
            </div>
<!--event feed -->
<div class="container">
  <h2>Upcoming Events</h2>
  <div class="row">

<?php
$result = mysqli_query($mysqli,"SELECT * FROM event, user WHERE user_id = manager_id AND event >= cast((now()) as date) AND public='1' AND approved='1' ORDER BY event LIMIT 3");
 while($row = mysqli_fetch_array($result)){
                                $eventName = $row["event_name"];
                                $eventDate = $row["event"];
                                $eventTime = $row["event_time"];
                                $eventLoc  = $row["location"];
                                $eventPoints = $row["points_worth"];
								$manFname = $row["fname"];
								$manLname = $row["lname"];
								$eventType = $row["event_type"];
                                echo '<div class="col-sm-4 event">';
                                echo '<div class="thumbnail">';
                                echo '<div class="overlay"></div>';								
								if ($eventType == 'Career'){
								echo '<img class="img-responsive" alt="alternative text" src="/images/Events/Career.jpg">';}
								else if ($eventType == 'Athletic'){
								echo '<img class="img-responsive" alt="alternative text" src="/images/Events/Athletic.jpg">';}
								else if ($eventType == 'Academic'){
								echo '<img class="img-responsive" alt="alternative text" src="/images/Events/Academic.jpeg">';}
								else if ($eventType == 'Meeting'){
								echo '<img class="img-responsive" alt="alternative text" src="/images/Events/Meeting.jpg">';}
								else if ($eventType == 'Party'){
								echo '<img class="img-responsive" alt="alternative text" src="/images/Events/Party.jpg">';}
								else{
								echo '<img class="img-responsive" alt="alternative text" src="/images/Events/Other.jpg">';}						
                                echo ' </div>';
                                echo '<span class="label label-info date">' .$eventDate. '</span>'; echo '  ';
                                echo '<span class="label label-info date"> Monarch Points: ' .$eventPoints. '</span>'; echo '  ';
								echo '<span class="label label-danger"> Manager: ' .$manFname. ' ' .$manLname. '</span>';
                                echo '<p>';
                                echo '<strong>' .$eventName. '</strong><br>';
                                echo '<em>' .$eventLoc. '</em><br>';
                                echo '<span class="small">' .$eventTime. '</span>';
                                echo '</p>';
                                echo '</div>';

                        }

?>
</div>
</div>
	    <div id="Middle">
	      <div class="panel-group" id="accordion">
	      	<div class="panel panel-primary" style="margin-top:1em;border-width:4px;min-width:9em;width:70%;display:inline-block">
		  <div class="panel-heading" >
		    <h4 class="panel-title" style="color:black">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">LOGIN</a></h4>
		  </div>
		  <div id="collapse1" class="panel-collapse collapse">
			<div class"panel-body">
				<hr>
				<form id="demo" action="includes/process_login.php" method="post" name="login_form">
					<p id="user" style="display:inline" padding: 0px 50px 0px 0px></p>Username:  <input type="text" align="center" name="username" value=""><br>
					<p id="pas"  style="display:inline" align="left"></p>Password: <input type="password" name="password" value="" style="min-width:3em;max-width:25em"><br>
				<hr>
					<input type="submit" value="Submit">
				</form> 
			</div>
		  </div>
		</div>
	      </div>
	    
	    <?php if(login_check($mysqli) == false) :?>
		
		<div class="panel-group" id="accordion">
                <div class="panel panel-primary" style="margin-top:1em;border-width:4px;min-width:9em;width:70%;display:inline-block">
                  <div class="panel-heading" >
                    <h4 class="panel-title" style="color:black">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">REGISTER</a></h4>
                  </div>                  <div id="collapse2" class="panel-collapse collapse">
                        <div class"panel-body">
			<!-- redirect for guests and student registration-->
			<a class="btn btn-default" href="typical_register.php" style="margin:1em;width:45%">Students/Guests</a>
			
       			<!--redirect for content managers, moderators, and administrators
			<a class="btn btn-default" href="privileged_register.php" style="margin:1em;float:left;width:45%">Privileged User</a>-->
                  	</div>
		  </div>
		  </div>
		  </div>
		  <br><br>
	    <?php endif ?>
	    </div>
        </section>
	<section class="Footer"><p><?php $mypath = ltrim(str_replace(dirname(__FILE__) ,"",__FILE__),'/'); 
		 echo"Last Modified: ".date("m/d/Y. h:ia ",filemtime($mypath));
		?></p></section>
     </section>
</div>

</body>
</html>

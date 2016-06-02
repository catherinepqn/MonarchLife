<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Protected Page</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css" title="preferred" />
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
		<!-- bootstrap -->
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
			<a class="navbar-brand" href="#">Monarch Life</a>
		</div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="http://monarch-life.cs.odu.edu/index.php">Home</a></li>
				<li><a href="http://monarch-life.cs.odu.edu/about.php">About</a></li>
				<li><a href="http://www.odu.edu/">ODU</a></li>
				<li><a href="http://monarch-life.cs.odu.edu/contact.php">Contact</a></li>
					<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
					</div>
			<button type="submit" class="btn btn-default">Submit</button>
					</form>
			</ul>
         </div>
		</div>
    </nav>
<section class="bg">
<section style="padding=80em">
	<?php if (login_check($mysqli) == true) : ?>
		<div style="margin:10px;text-align:left;border:solid black 4px;display:inline-block">
            <?php echo '<h3><p style="margin:4px">'.htmlentities($_SESSION['fname']).' '.htmlentities($_SESSION['lname']).'</p><p>RANK: '.htmlentities($_SESSION['rank']).'</p><p>MP: '.htmlentities($_SESSION['monarchpoints']).'</p><p>PP: '.htmlentities($_SESSION['pridepoints']).'</p></h3>'; ?>
			<p><a href="includes/logout.php" style="text-decoration:none;color:inherit"><strong>Logout</strong></a></p>
		</div>

	    
	<?php if(isset($_SESSION['type'])) {
		// Begin guest interface
		if($_SESSION['type'] == 'guest') {
		   header('Location: guest_page.php');
		   echo '<p>Guest<p>';
		   echo '<p> Below is the event feed of all events currently open.</p>';
		   echo "<table border='1'>
				<tr>
					<th>EventName</th>
					<th>EventDate</th>
					<th>EventTime</th>
					<th>Location</th>
					<th>Points</th>
				<th>Manager ID</th>
			</tr>";
		
			$result = mysqli_query($mysqli,"SELECT * FROM event ");
			while($row = mysqli_fetch_array($result)){
				if($row["approved"] == 1){
				$eventName = $row["event_name"];
				$eventDate = $row["event"];
				$eventTime = $row["event_time"];
				$eventLoc  = $row["location"];
				$eventPoints = $row["points_worth"];
				$eventMan = $row["manager_id"];
				echo "<tr><td>" .$eventName. "</td><td>" .$eventDate. "</td><td>" .$eventTime. "</td><td>"
					.$eventLoc. "</td><td>" .$eventPoints. "</td><td>".$eventMan."</td></tr>";
			}
		}
		echo "</table>";
		
		
		}
		// End guest interface
		
		// Begin student interface
		 else if ($_SESSION['type'] == 'student') {
		 header('Location: student_page.php');
		}
		// End student interface 
		
		// Start Content Manager interface
		else if ($_SESSION['type'] == 'content_manager') {
		header('Location: content_man_page.php');
		echo '<p>Content Manager.</p>';
		echo "<table border='1'>
		<tr>
			<th>EventName</th>
			<th>EventDate</th>
			<th>EventTime</th>
			<th>Location</th>
			<th>Points</th>
			<th>Manager ID</th>
		</tr>";
		
		$result = mysqli_query($mysqli,"SELECT * FROM event ");
		while($row = mysqli_fetch_array($result)){
			if($row["manager_id"] == $_SESSION['user_id'] && $row["approved"] == 1){
			$eventName = $row["event_name"];
			$eventDate = $row["event"];
			$eventTime = $row["event_time"];
			$eventLoc  = $row["location"];
			$eventPoints = $row["points_worth"];
			$eventMan = $row["manager_id"];
			echo "<tr><td>" .$eventName. "</td><td>" .$eventDate. "</td><td>" .$eventTime. "</td><td>"
				.$eventLoc. "</td><td>" .$eventPoints. "</td><td>".$eventMan."</td></tr>";
			}
		}
		echo "</table>";

		
		echo'<form action="http://monarch-life.cs.odu.edu/eventRegistration.php">
			<input type="submit" value="Register Your Event">
		</form>';		
		
		} //end of Content Manager 
		
		//begin Moderator Interface
		else if ($_SESSION['type'] == 'moderator') {
		header('Location: moderator/moderator_page.php');
		echo '<p>Moderator.</p>';
		}// end of Moderator

		else if ($_SESSION['type'] == 'administrator') {//begin administrator
		header('Location: administrator_page.php');
		}//end of administrator
	
	}//end of session type 
	
	else {
		echo '<p>Your user type was never set.</p>';
		}
		

	?>
    <div> </div>

     
			<section class="Footer"><p><?php $mypath = ltrim(str_replace(dirname(__FILE__) ,"",__FILE__),'/');
                 echo"Last Modified: ".date("m/d/Y. h:ia ",filemtime($mypath));
                ?></p></section>
        <?php else : ?>
            <p>
                <span class="error">login_check returned: <?php echo (int) login_check($mysqli);echo htmlspecialchars(help());?>You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
</section>
</section>
    </body>
</html>


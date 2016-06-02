<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-us">
<head>
	<!--Title of Website-->
	<title>Contact MonarchLife</title>

	<!--Metadata tags-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--Link to css stylesheet-->
	<link rel="stylesheet" type="text/css" href="stylesheet.css" title="preferred">
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
      <a class="navbar-brand" href="#">MonarchLife</a>
    </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<?php include("includes/navigation.php"); ?>
          </div>
          </div>
          </nav>
<div class="container">

      <div class="blog-header">
        <h1 class="blog-title">About MonarchLife</h1>
      </div>

        <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
                         <h3> <strong>WHAT IS MONARCHLIFE?</strong></h3>
                         <p>MonarchLife is a free application geared to providing the best information and help for ODU students.
                         It acts as a small guidebook that students can use anywhere by providing real time access to resources and information
                         about ODU. </p>

                         <p> It is a highly personalized and interactive application that allows students to upload their own schedules,
                         view and select what events that show up on their news feed, provides major resources in one convenient location, and
                         uses gamification to motivate and reward students both in and out of the application! The application is not only exclusive
                         to students, faculty and staff can also use it to reach out to students, upload events,and see the statistics and
                         data of uploaded events.</p>
                <img class="img-responsive" src="images/thomas_capora
le.jpg" align="right">
                         <p>MonarchLife was originally proposed by <strong>Thomas Caporale</strong>,
                         a graduate student From Old Dominion University.</p>

                         <p><strong>THE TEAM</strong></p>
                         <p>MonarchLife is developed by a team of dedicated Computer Science students at ODU.</p>
                         <p><strong>EMMETT ROBERSON</strong></p>
                         <p>Team Lead/Database Programmer/Webpage Designer</p>

                         <p><strong>PHIL ELDRIDGE</strong></p>
                         <p>Systems Administrator/ Database Specialist</p>

                          <p><strong>CATHERINE NGUYEN</strong></p>
                         Communications/Webpage Designer</p>

                          <p><strong>ROHAN SHAH</strong></p>
                          <p>Webpage Design and Maintenance</p>

                         <p><strong>KRESHNIK SHENA</strong></p>
                         <p>Analysis and Algorithms </p>

                          <p><strong>MICHAEL WRIGHT</strong></p>
                         <p>Database Programmer/System Administrator</p>

                      </div>
                </div>
                </div>
		</section>
		<section class="Footer"><p><?php $mypath = ltrim(str_replace(dirname(__FILE__) ,"",__FILE__),'/');
                 echo"Last Modified: ".date("m/d/Y. h:ia ",filemtime($mypath));
                ?></p></section>
	</section>

</body>
</html>

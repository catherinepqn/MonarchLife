<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-us">
<head>
	<!--Title of Website-->
	<title>Registration Successful</title>

	<!--Metadata tags-->
	<meta name="viewport" content="width=device-width, initial- scale=1.0">

	<!--Link to css style sheet-->
	<link rel="stylesheet" type="text/css" href="stylesheet.css" title="preferred">
	
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
<?php include("includes/navigation.php"); ?>
          </div>
          </div>
          </nav>


	<section class="bg">
		<section class="Container">
		
			 <h4><strong>You've successfully registered! Please return to the homepage and log in.</strong></h4> <br>
			 
			 <p><a href="includes/logout.php" style="text-decoration:none;color:black"><button>Return to homepage</button></a></p>
		      </div>
		</section>
		
	</section>
</body>
</html>

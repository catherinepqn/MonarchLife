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
        <h1 class="blog-title">Contact Us</h1>
      </div>

        <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
			  <img src="images/sandy_waters.jpg" style="margin:2% 8% 2% 8%;height:250px;width:180px;float:right;clear:right">
			  <p><strong>Sandy Waters</strong></p>
			  Executive Director for Advising & Transfer Programs<br>
			  Advising & Transfer Programs<br>
			  Address: 2014 Student Success Center<br>
			  Norfolk, VA 23529<br>
			  Phone: 757-683-6485<br>
			  E-mail: smwaters@odu.edu<br>
			  
			  <br><strong>Division of Student Engagement & Enrollment Services (SEES)</strong><br>
			  Address: 2008 Webb University Center<br>
			  Norfolk, VA 23529 <br>
			  Phone: 757-683-3442 (office) <br>
			  757-683-5715 (fax) <br>
			  E-mail: oducares@odu.edu <br>
			  
			  <HR WIDTH="90%"> 
			  
			  
			  
		      </div>
		</section>
		<section class="Footer"><p><?php $mypath = ltrim(str_replace(dirname(__FILE__) ,"",__FILE__),'/');
                 echo"Last Modified: ".date("m/d/Y. h:ia ",filemtime($mypath));
                ?></p></section>
	</section>

</body>
</html>

<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-us">
<head>
	<!--Title of Website-->
	<title>Odu Resources</title>

	<!--Metadata tags-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--Link to css stylesheet-->
	<link rel="stylesheet" type="text/css" href="stylesheet.css" title="preferred">
	
	<link rel="stylesheet" type="text/css" href="tablestyle.css">
	
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

<br>
	<table>
		<tr>
			<th>Resource Name</th>
			<th>Address</th>
			<th>Link</th>
		</tr>
	<?php
			$result = mysqli_query($mysqli,"SELECT * FROM resource ORDER BY resource_name");
			while($row = mysqli_fetch_array($result)){
				$resourceName = $row["resource_name"];
				$address = $row["address"];
				$resourceLink = $row["link"];
				
			
				echo "<tr><td>" .$resourceName. "</td><td>" .$address. "</td><td><a href = '$resourceLink'>".$resourceLink."</a> </td>";	
							
			}
	?>
	</table>
	<br><br>
			  
	</div> <!--End of container -->
		
		<section class="Footer"><p><?php $mypath = ltrim(str_replace(dirname(__FILE__) ,"",__FILE__),'/');
                 echo"Last Modified: ".date("m/d/Y. h:ia ",filemtime($mypath));
                ?></p></section>
	</section>

</body>
</html>

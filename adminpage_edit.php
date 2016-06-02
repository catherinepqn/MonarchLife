<?php
include_once 'includes/adm_db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

 function renderForm($id, $username, $lastname, $firstname, $midname, $email, $type, $permission, $rank, $monarchpoints, $pridepoints, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Edit User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./registerstyle/registerstyle.css" title="preferred"> 
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
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="" method="post">
 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
 <div>
 <p><strong>ID:</strong> 
 <?php echo $id; ?>
 </p>
 <strong>Username: </strong> <input type="text" name="username" value="<?php echo $username; ?>"/><br/>
 <strong>Last Name: </strong> <input type="text" name="lastname" value="<?php echo $lastname; ?>"/><br/>
 <strong>First Name: </strong> <input type="text" name="firstname" value="<?php echo $firstname; ?>"/><br/>
 <strong>Middle Name: </strong> <input type="text" name="midname" value="<?php echo $midname; ?>"/><br/>
 <strong>Email: </strong> <input type="text" name="email" value="<?php echo $email; ?>"/><br/>
 <strong>Type: </strong> <input type="text" name="type" value="<?php echo $type; ?>"/><br/>
 <strong>Permission: </strong> <input type="text" name="permission" value="<?php echo $permission; ?>"/><br/>
 <strong>Rank: </strong> <input type="text" name="rank" value="<?php echo $rank; ?>"/><br/>
 <strong>Monarch Points: </strong> <input type="text" name="monarchpoints" value="<?php echo $monarchpoints; ?>"/><br/>
 <strong>Pride Points: </strong> <input type="text" name="pridepoints" value="<?php echo $pridepoints; ?>"/><br/>
 
 <input type="submit" name="submit" value="Submit">
 </div>
 </form> 
 </body>
 </html> 
 <?php
 }

 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['id']))
 {
 // get form data, making sure it is valid
$id = $_POST['id'];
$username= mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['username']));
$lastname= mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['lastname']));
$firstname= mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['firstname']));
$midname= mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['midname']));
$email= mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['email']));
$type= mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['type']));
$permission= mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['permission']));
$rank= mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['rank']));
$monarchpoints= mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['monarchpoints']));
$pridepoints= mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['pridepoints']));
 
 // check that firstname/lastname fields are both filled in
 if ($firstname == '' || $lastname == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($id, $username, $lastname, $firstname, $midname, $email, $type, $permission, $rank, $monarchpoints, $pridepoints, $error);
 }
 else
 {
 // save the data to the database
 mysqli_query($mysqli,"UPDATE user SET username='$username',lname='$lastname', fname='$firstname', mname='$midname', email='$email', 
 type='$type', permission='$permission', rank='$rank', monarchpoints='$monarchpoints', pridepoints='$pridepoints' WHERE user_id='$id'")
	or die(mysqli_error(mysqli)); 
 
 // once saved, redirect back to the view page
 header("Location: adminpage_view.php"); 
 }
 }
 else
 {
 // if the 'id' isn't valid, display an error
 echo 'Error!';
 }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
 $id = $_GET['id'];
 $result = mysqli_query($mysqli, 'SELECT * FROM user WHERE user_id='.$id)
 or die(mysqli_error()); 
 $row = mysqli_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
$id =$row['user_id'];
$username =$row['username'];
$lastname =$row['lname'];
$firstname =$row['fname'];
$midname =$row['mname'];
$email =$row['email'];
$type =$row['type'];
$permission =$row['permission'];
$rank =$row['rank'];
$monarchpoints =$row['monarchpoints'];
$pridepoints =$row['pridepoints'];
 
 // show form
 renderForm($id, $username, $lastname, $firstname, $midname, $email, $type, $permission, $rank, $monarchpoints, $pridepoints,'');
 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
 {
 echo 'Error!';
 }
 }
?>

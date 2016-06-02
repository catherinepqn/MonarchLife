<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';

sec_session_start();
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['username']))
 {
 // get id value
 $id = $_GET['username'];
 // delete the entry
 $result = mysqli_query($mysqli, "UPDATE user SET type = 'student' WHERE username ='$id'")
	or die(mysqli_error($mysqli)); 
 echo "haha";
 // redirect back to the view page
 header("Location: content_providers.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 echo "Whoops";
 }
echo "NOW HERE";
 
?>

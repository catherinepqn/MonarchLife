<?php
include_once 'includes/adm_db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 // delete the entry
 $result = mysqli_query($mysqli, 'DELETE FROM user WHERE user_id='.$id)
	or die(mysqli_error($mysqli)); 
 echo "haha";
 // redirect back to the view page
 header("Location: adminpage_view.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 echo "Whoops";
 //header("Location: adminpage_view.php");
 }
echo "NOW HERE";
 
?>

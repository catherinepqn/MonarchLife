<?php
include_once '../includes/adm_db_connect.php';
include_once '../includes/functions.php';

sec_session_start();
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['event_id']))
 {
 // get id value
 $id = $_GET['event_id'];
 // delete the entry
 $result = mysqli_query($mysqli, "DELETE FROM event WHERE event_id='$id'")
	or die(mysqli_error($mysqli)); 
 echo "haha";
 // redirect back to the view page
 header("Location: manage_events.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 echo "Whoops";
 //header("Location: manage_events.php");
 }
echo "NOW HERE";
 
?>

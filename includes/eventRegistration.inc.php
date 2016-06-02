<?php
include_once 'adm_db_connect.php';
include_once 'psl-config.php';

$error_msg = "";
 
if (isset($_POST['manager_id'], $_POST['event_name'], $_POST['event'], $_POST['event_time'],
	$_POST['event_type'],$_POST['location'],$_POST['points_worth'])) {
	$manager_id = filter_input(INPUT_POST, 'manager_id', FILTER_SANITIZE_STRING);
    $event_name = filter_input(INPUT_POST, 'event_name', FILTER_SANITIZE_STRING);
    $event = filter_input(INPUT_POST, 'event', FILTER_SANITIZE_STRING);
    $event_time = filter_input(INPUT_POST, 'event_time', FILTER_SANITIZE_STRING);
    $event_type = filter_input(INPUT_POST, 'event_type', FILTER_SANITIZE_STRING);
    $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
	$points_worth = filter_input(INPUT_POST, 'points_worth', FILTER_SANITIZE_STRING);

      
if (empty($_POST["event_name"]) || empty($_POST["event"]) || empty($_POST["event_time"]) || empty($_POST["event_type"]) || empty($_POST["location"]) || empty($_POST["points_worth"]) || empty($_POST['manager_id'])) {
	 $error_msg .= '<p class="error">One or more fields are empty!</p>';
   }	  
		
	if (empty($error_msg)) {	
		// Insert the new event into the database
	 if ($insert_stmt = $mysqli->prepare("INSERT INTO event (manager_id, event_name, event, event_time, event_type, location, points_worth) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
        $insert_stmt->bind_param('sssssss', $manager_id, $event_name, $event, $event_time, $event_type, $location, $points_worth);
        // Execute the prepared query.
        if (! $insert_stmt->execute()) {
            header('Location: ../error.php?err=Registration failure: INSERT');
        }   
		
		header('Location: ./event_register_success.php');
     }
	}
   
}


?>
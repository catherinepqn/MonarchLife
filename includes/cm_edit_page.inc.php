<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
 
$error_msg = "";
 
if (isset($_POST['email'], $_POST['fname'], $_POST['mname'], $_POST['lname'],$_POST['username'],$_POST['password'],$_POST['date_of_birth'], $_POST['user_id'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $mname = filter_input(INPUT_POST, 'mname', FILTER_SANITIZE_STRING);	
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	$dateofbirth = filter_input(INPUT_POST, 'date_of_birth', FILTER_SANITIZE_STRING);
	$user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_STRING);

	if (filter_var($email, FILTER_VALIDATE_EMAIL)){

	// Update an event in the database
	$password = hash ('sha1', $password);
	$crap = $mysqli->prepare("UPDATE user SET email = ?, fname = ?, mname = ?, lname = ?, username = ?, password = ?, date_of_birth = ? WHERE user_id = ?");
    $crap->bind_param('ssssssss', $email, $fname, $mname, $lname, $username, $password, $dateofbirth, $user_id);
	$crap->execute();
	
	
	
	} else {
		echo '<p>Not a valid email!!!!</p>'; 
		
	}

}
?>
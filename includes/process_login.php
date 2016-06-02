<?php
include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start(); //start the php session.

if(isset($_POST['username'], $_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(login($username,$password,$mysqli) == true) {
	
		header('Location: ../protected_page.php');
		
	} else {
		header('Location: ../index.php?error=1');
		
	}
} else {
	echo 'Invalid Request';
}
?>

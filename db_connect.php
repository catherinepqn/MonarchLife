<?php
include_once 'psl-config.php';

$mysqli = new mysqli(HOST,USER,PASSWORD,DATABASE);
if(!$mysqli)//if connection should fail.
	{
		die("Connection couldn't be made" . mysqli_connect_error());
}
?>

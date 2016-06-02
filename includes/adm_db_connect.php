<?php
include_once 'psl-config.php';

$mysqli = new mysqli("localhost", "adm_user", "oicu812", "monarchlife");
if(!$mysqli)//if connection should fail.
	{
		die("Connection couldn't be made" . mysqli_connect_error());
}
?>

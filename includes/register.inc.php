<?php
include_once 'adm_db_connect.php';
//include_once './db_connect.php';
$error_msg = "";
 
if (isset($_POST['username'], $_POST['email'], $_POST['password'],$_POST['fname'],$_POST['lname'],$_POST['type'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $firstname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
    }
 
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if (strlen($password) < 4) {
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
 
 
    $prep_stmt = "SELECT user_id FROM user WHERE email = '?' LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
   // check existing email  
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">A user with this email address already exists.</p>';
                        $stmt->close();
        }
                $stmt->close();
    } else {
        $error_msg .= '<p class="error">Database error Line</p>';
                //$stmt->close();
    }
 
    // check existing username
    $prep_stmt = "SELECT user_id FROM user WHERE email = '?' LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
 
                if ($stmt->num_rows == 1) {
                        // A user with this username already exists
                        $error_msg .= '<p class="error">A user with this username already exists</p>';
                        $stmt->close();
                }
                $stmt->close();
        } else {
                $error_msg .= '<p class="error">Database error</p>';
               // $stmt->close();
        }
 
    if (empty($error_msg)) {

        $password = hash('sha1', $password);
        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO user (username, email, password,fname,lname,type) VALUES (?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssssss', $username, $email, $password,$firstname, $lastname, $type);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ./error.php?err=Registration failure: INSERT');
            }
        }
		if(isset($_POST['privileged_registration_form']))
		{	
        	header('Location: ./privileged_register.php?error=successfully registered: '.htmlentities($_POST['username']));
		}
		else
		{
			
			header('Location: ./register_success.php');
		}
		
    }
}


?>

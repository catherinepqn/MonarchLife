<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';

sec_session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheet.css" title="preferred"> 
   <!-- bootstrap -->
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
         <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>'
		
		 <!-- CSS -->
	<link rel="stylesheet" type="text/css" href="./registerstyle/registerstyle.css">
	
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
			<a class="navbar-brand" href="#">Monarch Life</a>
		</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<?php include("includes/navigation.php"); ?>
			</div>
		</div>
    </nav>

    <?php if (!empty($error_msg)) {
        echo $error_msg;
    }
    ?>
<center>	<div class="login-card" center>

 <!--BEGIN #signup-form -->
    <div id="signup-form">
        
        <!--BEGIN #subscribe-inner -->
        <div id="signup-inner">
        
        	<div class="clearfix" id="header">
        	<img id="signup-icon" src="./registerstyle/signup.png" alt="" />
        
                <h1>MonarchLife Account</h1>

            
            </div>
			<p>Please complete the fields below, ensuring you use a valid email address as you will be sent a validation code which you will need the first time you login to the site.</p>
	
	
    <form action="<?php echo esc_url($_SERVER['PHP_SELF']);?>"
        method = "post"
        name="registration_form">
         
            	
                <p>
                <label for="name">First Name</label>
                <input style="width:60%;" id="fname" type="text" name="fname" value="" />
                </p>
                
                <p>
                <label for="lname">Last Name</label>
                <input style="width:60%;" id="lname" type="text" name="lname" value="" />
                </p>
                
                <p>
                <label for="email">Email</label>
                <input style="width:60%;" id="email" type="text" name="email" value="" />
                </p>
                
                <p>
                <label for="username">Username</label>
                <input style="width:60%;" id="username" type="text" name="username" value="" />
                </p>
				
				<p>
                <label for="password">Password</label>
                <input style="width:60%;" id="password" type="password" name="password" value="" />
                </p><br>
				
				Type: <select id="type" name="type"  style="float:center;font-size:1em" >
						 <option value="student">Student</option>
						 <option value="guest">Guest</option>
						 </select><br><br>
				
                <p>
                <button id="submit" type="submit">Submit</button>
                </p>
                
            </form>
            

            </div>
        
        <!--END #signup-inner -->
        </div>
        
    <!--END #signup-form -->   
    </div>
	
    </div></center>
</body>
</html>

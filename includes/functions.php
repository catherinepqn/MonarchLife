<?php
include_once 'psl-config.php';

function sec_session_start() {
	$session_name = 'sec_session_id'; //session name.
	$secure = SECURE;
	$httponly = true;
	
	if(ini_set('session.use_only_cookies',1) == FALSE) {
		header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
		exit();
	}
	$cookieParams = session_get_cookie_params();

	session_set_cookie_params($cookieParams["lifetime"],
								$cookieParams["path"],
								$cookieParams["domain"],
								$secure,						$httponly);
	
	session_name($session_name);
	session_start();
	session_regenerate_id(true);
}
ini_set('display_errors','On');
error_reporting(E_ALL);

function login($username,$password,$mysqli) {
	if($stmt = $mysqli->prepare("SELECT  user_id, email, password, type, fname, lname, rank,monarchpoints,pridepoints,mname,date_of_birth,college,academic_level FROM user where username = ? LIMIT 1")) {
		$stmt->bind_param('s',$username);
		$stmt->execute();
		$stmt->store_result();

		$stmt->bind_result($user_id,$email,$db_password,$type, $fname, $lname,$rank,$mp,$pp,$mname,$date_of_birth,$college,$alevel);
		$stmt->fetch();

		$password = hash('sha1',$password);
		if($stmt->num_rows == 1) {
			if(checkbrute($user_id, $mysqli) == true) {
				return false;
			} else {
				if($db_password == $password) {
					$user_browser = $_SERVER['HTTP_USER_AGENT'];
					preg_replace("/[^0-9]+/", "", $user_id);
					$_SESSION['user_id'] = $user_id;
					preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
					$_SESSION['username'] = $username;
					$_SESSION['type'] = $type;
					$_SESSION['fname'] = $fname;
					$_SESSION['lname'] = $lname;
					$_SESSION['rank'] = $rank;
					$_SESSION['mname'] = $mname;
					$_SESSION['date_of_birth'] = $date_of_birth;
					$_SESSION['college'] = $college;
					$_SESSION['academic_level'] = $alevel;
					$_SESSION['monarchpoints'] = $mp;
					$_SESSION['pridepoints'] = $pp;
					
					$_SESSION['login_string'] = hash('sha1', $password.$user_browser);
					return true;
					} else {
						$now = time();
						$mysqli->query("INSERT INTO login_attempts(uid,time) VALUES ('$user_id', '$now')");
						return false;
						}
					}
			} else {
				return false;
			}
		}
}

function checkbrute($user_id, $mysqli) {
// Get timestamp of current time 
    $now = time();
 
    // All login attempts are counted from the past hour. 
    $valid_attempts = $now - ( 60 * 60);
 
    if ($stmt = $mysqli->prepare("SELECT time 
                             FROM login_attempts 
                             WHERE uid = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
 
        // Execute the prepared query. 
        $stmt->execute();
        $stmt->store_result();
 
        // If there have been more than 5 failed logins 
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}


function login_check($mysqli) {
	if(isset($_SESSION['user_id'], $_SESSION['username'],$_SESSION['login_string'])) {
		$user_id = $_SESSION['user_id'];
		$login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
		$user_browser = $_SERVER['HTTP_USER_AGENT'];

		if($stmt = $mysqli->prepare("SELECT password FROM user WHERE user_id = ? LIMIT 1")) {
			$stmt->bind_param('i', $user_id);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();

			if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha1',$password.$user_browser);

				if ($login_check == $login_string) {
                    // Logged In!!!! 
                    return true;
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }
    } else {
        // Not logged in 
        return false;
    }
}

function esc_url($url) {

	if('' == $url) {
		return $url;
	}

	$url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}

function isLoggedin() {
	
	if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
		return true;
	} else {
		return false;
	}
}

function isadm() {

        if($_SESSION['type']== 'administrator'){
                return true;
        } else {
                return false;
        }
}

function ismod() {

        if($_SESSION['type']== 'moderator'){
                return true;
        } else {
                return false;
        }
}

function ismgr() {

        if($_SESSION['type']== 'content_manager'){
                return true;
        } else {
                return false;
        }
}

function mysqli_result($res,$row=0,$col=0){
    $numrows = mysqli_num_rows($res);
    if ($numrows && $row <= ($numrows-1) && $row >=0){ 
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}
?>



<?php
include_once 'psl-config.php';
include_once 'functions.php';

$pdo = new PDO(
    'mysql:host=localhost;dbname=monarchlife',
    'root',
    'lifeofmonarch');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(! isset($_POST['search']) || !isset($_POST['field'])) {
	echo 'Sorry, no results found.';
}
$search=$_POST['search'];
$field=$_POST['field'];

switch($_POST['field']) {

	case 'Users':
		$searchq=$_POST['search'];
		$stmt = $pdo->prepare( 'SELECT * FROM user WHERE fname LIKE ? or lname LIKE ? or email LIKE ?' );
		$stmt->execute(["%$searchq%","%$searchq%", "%$searchq%"]);

		break;

	case 'Events':
		$searchq=$_POST['search'];
                $stmt = $pdo->prepare( 'SELECT * FROM event WHERE event_name LIKE ? or event LIKE ? or event_type LIKE ?' );
		$stmt->execute(["%$searchq%","%$searchq%", "%$searchq%"]);

		break;

	case 'Resources':
		$searchq=$_POST['search'];
                $stmt = $pdo->prepare( 'SELECT * FROM resource WHERE resource_name LIKE ?' );
		$stmt->execute(["%$searchq%"]);

		break;


	default:
		echo "wth";
		break;
}


//$results = $stmt->fetchAll();


	switch($_POST['field']) {

        case 'Users':
		while ( ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) !== false ){
                        $rows[]=$row;
                        foreach($rows as $row){
                                echo "Username: " .$row['username']. "<br>";
                        }
                }	
        
                break;

        case 'Events':
                while ( ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) !== false ){
                        $rows[]=$row;
                        foreach($rows as $row){
                                echo "Event Found: " .$row['event_name']. "<br>";
                        }
                }
        
                break;

        case 'Resources':
		while ( ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) !== false ){
                        $rows[]=$row;
                        foreach($rows as $row){
                                echo "Resource Found: " .$row['resource_name']. "<br>";
                        }
               } 

                break;


        default:
                echo "wth";
                break;
}

?>

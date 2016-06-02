<?php
include_once 'includes/adm_db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

/*
if(isset($_POST['Sports'])){

        $result = ($mysqli,"SELECT * FROM PREFERENCES WHERE metadata = '".$_POST['Sports']."' and user_name = '".$_SESSION['username']."'");

        if(mysqli_num_rows($result) = 1)
        {
                $result = ($mysqli, "DELETE FROM preferences where user_name = '".$_SESSION['username']."' and metadata = '".$_POST['Sports']."'");
    }
        else
        {
                $result = ($mysqli, "INSERT INTO preferences (user_name,metadata) VALUES ('".$_SESSION['username']."','".$_POST['Sports']."'");
        }
}
if(isset($_POST['Robotics'])){

$result = ($mysqli,"SELECT * FROM PREFERENCES WHERE metadata = '".$_POST['Robotics']."' and user_name = '".$_SESSION['username']."'");

        if(mysqli_num_rows($result) = 1)
        {
                $result = mysqli_query($mysqli, "DELETE FROM preferences where user_name = '".$
_SESSION['username']."' and metadata = '".$_POST['Robotics']."'");
    }
        else
        {
                $result = mysqli_query($mysqli, "INSERT INTO preferences (user_name,metadata) V
ALUES ('".$_SESSION['username']."','".$_POST['Robotics']."'");
        }

}
if(isset($_POST['General'])){
$result = mysqli_query($mysqli,"SELECT *
        if(mysqli_num_rows($result) = 1)
        {
                $result = mysqli_query($mysqli, "DELETE FROM preferences where user_name = '".$
_SESSION['username']."' and metadata = '".$_POST['General']."'");
    }
        else
        {
                $result = mysqli_query($mysqli, "INSERT INTO preferences (user_name,metadata) V
ALUES ('".$_SESSION['username']."','".$_POST['General']."'");
        }

}

if(isset($_POST['Community Service'])){
$result = mysqli_query($mysqli,"SELECT * FROM PREFERENCES WHERE metadata = '".$_POST['Community Service']."' and user_name = '".$_SESSION['username']."'");

        if(mysqli_num_rows($result) = 1)
        {
                $result = mysqli_query($mysqli, "DELETE FROM preferences where user_name = '".$
_SESSION['username']."' and metadata = '".$_POST['Community Service']."'");
    }
        else
        {
                $result = mysqli_query($mysqli, "INSERT INTO preferences (user_name,metadata) V
ALUES ('".$_SESSION['username']."','".$_POST['Community Service']."'");
        }

}
if(isset($_POST['Greek'])){
$result = mysqli_query($mysqli,"SELECT * FROM PREFERENCES WHERE metadata = '".$_POST['Greek']."' and user_name = '".$_SESSION['username']."'");

        if(mysqli_num_rows($result) = 1)
        {
                $result = mysqli_query($mysqli, "DELETE FROM preferences where user_name = '".$
_SESSION['username']."' and metadata = '".$_POST['Greek']."'");
    }
        else
        {
                $result = mysqli_query($mysqli, "INSERT INTO preferences (user_name,metadata) V
ALUES ('".$_SESSION['username']."','".$_POST['Greek']."'");
        }

}
if(isset($_POST['Computer Science'])){

$result = mysqli_query($mysqli,"SELECT * FROM PRE */
//congrats you're done
header('Location: ./index.php');
?>

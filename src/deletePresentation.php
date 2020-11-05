<?php
    session_start();
    require_once 'db.php';
    require_once '../config/config.php';

    $db = new DataBase($HOST, $DBNAME, $USERNAME, $PASSWORD);

    $time = $_COOKIE['currentTimeFromJS'];
    $date = $_COOKIE['currentDateFromJS'];
    $studentID = $_SESSION['id'];

   if($_POST){
    $db->delete_presentation_by_studentID($_POST['studentID'], "'".$time."'", "'".$date."'");
    header('Location: day.php');
   }
?>
<?php
    session_start();
    require_once 'db.php';
    require_once '../config/config.php';

    $db = new DataBase($HOST, $DBNAME, $USERNAME, $PASSWORD);

    $time = $_COOKIE['currentTimeFromJS'];
    $date = $_COOKIE['currentDateFromJS'];

   if($_POST){
    if ( !isset($_POST['subject']) ) {
        die ('Please fill both the identity and password field!');
    }

    $db->add_new_presentation($_POST['subject'], $date, $time, $_SESSION['id']);
    header('Location: day.php');
   }
?>
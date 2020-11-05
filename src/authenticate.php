<?php
session_start();
require_once 'db.php';
require_once '../config/config.php';

$db = new DataBase($HOST, $DBNAME, $USERNAME, $PASSWORD);

$DATABASE_HOST = $HOST;
$DATABASE_USER = $USERNAME;
$DATABASE_PASS = $PASSWORD;
$DATABASE_NAME = $DBNAME;

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['identity'], $_POST['password']) ) {
	die ('Please fill both the identity and password field!');
}

if ($stmt = $con->prepare('SELECT ID, Password FROM Student WHERE Identity = ?')) {
    $stmt->bind_param('i', $_POST['identity']);
	$stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
       
        if ($_POST['password'] === $password) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['identity'] = $_POST['identity'];
            $_SESSION['id'] = $id;
            header('Location: home.php');
        } else {
            echo 'Incorrect password!';
        }
    } else {
        echo 'Incorrect identity!';
    }
	$stmt->close();
}
?>
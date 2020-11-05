<?php
require_once 'db.php';
require_once '../config/config.php';

$db = new DataBase($HOST, $DBNAME, $USERNAME, $PASSWORD);

$DATABASE_HOST = $HOST;
$DATABASE_USER = $USERNAME;
$DATABASE_PASS = $PASSWORD;
$DATABASE_NAME = $DBNAME;

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	die ('Email is not valid!');
}

if (preg_match('/[A-Za-z0-9]+/', $_POST['fullname']) == 0) {
    die ('Full name is not valid!');
}

if (preg_match('/[0-9]+/', $_POST['identity']) == 0) {
    die ('Identity is not valid!');
}

if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	die ('Password must be between 5 and 20 characters long!');
}

if ($stmt = $con->prepare('SELECT ID, password FROM Student WHERE Identity = ?')) {
	$stmt->bind_param('i', $_POST['identity']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		echo 'There is an account with this identity, please choose another!';
	} else {
        if ($stmt = $con->prepare('INSERT INTO Student (FullName, Identity, Email, Password) VALUES (?, ?, ?, ?)')) {
	        $stmt->bind_param('siss', $_POST['fullname'],$_POST['identity'], $_POST['email'], $_POST['password']);
            $stmt->execute();
            header('Location: ../login.html');
        } else {
	            echo 'Could not prepare statement!';
                }
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement!';
}
$con->close();
?>
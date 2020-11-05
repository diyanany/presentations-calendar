<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.html');
	exit();
}
?>  

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>
        Home Page
    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='../styles/styles.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
    <div class="top_nav">
        <img src="../images/logo.png" alt="logo" />
        <a class="active" href="logout.php">Logout</a>
        <a href="calendar.php">Go to Calendar</a>
        <a href="home.php">Home</a>
    </div>
    
    <main>
        <section class="main_section">
                <img id="imgleft" src="../images/step1.png" alt="home"/>
                <img id="imgright" src="../images/step2.png" alt="home"/>
                <img id="imgleft" src="../images/step3.png" alt="home"/>
        </section>
    </main>
</header>
</body>
</html>
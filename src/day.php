<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>
        Presentations
    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type='text/css' href='../styles/styles.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <?php include 'generateDay.php';?>

    <div class="top_nav">
        <img src="../images/logo.png" alt="logo" />
        <?php 
            if($is_logged === false)
                echo '<a class="active" href="../signup.html">Sign Up</a>'
        ?>
        <a class="<?php echo $class?>" href="<?php echo $url_text ?>"><?php echo $text ?></a>
        <a href="<?php echo $month ?>">Go to Calendar</a>
        <a href="home.php">Home</a>
    </div>

    <div id="presentations_modal" class="presentation_container">
        <table>
            <tr>
                <th class="day-header">Time</th>
                <th class="day-header">Subject of presentation</th>
            </tr>
             <?php
                 foreach($quarters as $quarter){
                     echo $quarter;
                 }
            ?>
        </table>
    </div>
</body>
<script>
    function setCookie(event){
        console.log(event);
        console.log("Print from the setCookie() function");
        var currentTime = event.target.offsetParent.parentElement.cells[0].innerText;
        console.log('currentDate: ', currentTime);
        document.cookie = "currentTimeFromJS = " + currentTime;
        console.log('cookie: ', document.cookie);
    }
</script>
</html>
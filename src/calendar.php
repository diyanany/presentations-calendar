<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>
        Calendar
    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='../styles/styles.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include 'generateCalendar.php';?>

    <div class="top_nav">
        <img src="../images/logo.png" alt="logo" />
        <?php 
            if($is_logged === false)
                echo '<a class="active" href="../signup.html">Sign Up</a>'
        ?>
        <a class="<?php echo $class?>" href="<?php echo $url_text ?>"><?php echo $text ?></a>
        <a href="calendar.php">Go to Calendar</a>
        <a href="home.php">Home</a>
    </div>

    <div id="calendar" class="container">
        <h3 class="h3_calendar">
       
            <a class="a_calendar_left" href="?ym=<?php echo $prev; ?>"> <i class="fa fa-arrow-left" style="font-size:24px, color:black"></i></a>
            <?php echo $html_title; ?>
            <a class="a_calendar_right" href="?ym=<?php echo $next; ?>"><i class="fa fa-arrow-right" style="font-size:24px, color:black"></i></a>
        </h3>
        <br>
        <table class="table_calendar">
            <tr class="tr_calendar">
                <th class="tableHead">Monday</th>
                <th class="tableHead">Tuesday</th>
                <th class="tableHead">Wednesday</th>
                <th class="tableHead">Thursday</th>
                <th class="tableHead">Friday</th>
                <th class="tableHead">Saturday</th>
                <th class="tableHead">Sunday</th>
            </tr>
            <?php
                foreach($weeks as $week){
                    echo $week;
                }
            ?>
        </table>
    </div>
</body>
<script>
    function setCookie(event){
        console.log("Print from the setCookie() function");
        var currentDate = event.toElement.offsetParent.title;
        console.log('currentDate: ', currentDate);
        document.cookie = "currentDateFromJS = " + currentDate;
        console.log('cookie: ', document.cookie);
    }
</script>
</html>
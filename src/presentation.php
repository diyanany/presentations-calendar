<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>
        Presentation
    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='../styles/styles.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include 'addPresentation.php';?>
    <div class="top_nav">
        <img src="../images/logo.png" alt="logo" />
        <a class="active" href="logout.php">Logout</a>
        <a href="calendar.php">Go to Calendar</a>
        <a href="home.php">Home</a>
    </div>

    <main>
        <section>
        <div class="addPresentation">
                <form action="addPresentation.php" method="POST" id="add_presentation_form" class="form">
                    <h4> 
                        Date: <?php echo $date;?>
                    </h4>
                    <h4>
                        Time: <?php echo $time;?>
                    </h4>
                    <input class="inp_form" id="subject" type="text" name="subject" placeholder="Subject*">
                    <input id="btn_login" class="inp_login" type="submit" value="Add">
                </form>
            </div>
        </section>
    </main>
</body>
</html>
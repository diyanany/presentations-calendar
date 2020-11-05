<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>
        Delete Presentation
    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='../styles/styles.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include 'deletePresentation.php';?>
    <div class="top_nav">
        <img src="../images/logo.png" alt="logo" />
        <a class="active" href="logout.php">Logout</a>
        <a href="calendar.php">Go to Calendar</a>
        <a href="home.php">Home</a>
    </div>

    <main>
        <section>
        <div class="deletePresentation">
                <form action="deletePresentation.php" method="POST" id="delete_presentation_form" class="form">
                    <h4> 
                        Are you sure you want to delete this presentation?
                    </h4>
                    <input class="inp_form" id="studentID" type="hidden" name="studentID" value=<?php echo $_SESSION['id'];?>>
                    <input id="btn_login" class="inp_login" type="submit" value="Delete">
                    <button id="btn_login" class="inp_login" value="Cancel"><a href="day.php">Cancel</a></Button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
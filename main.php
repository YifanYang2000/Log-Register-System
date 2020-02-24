
<?php

session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('Location: login.php');
 }
 
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
    </head>

    <body>
        <h1>Welcome to the Homepage</h1>

        <?php 
        if(isset($_SESSION['success'])) : ?>
            <div>
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

<!-- if the user is logged in -->

        <?php if(isset($_SESSION['username'])) : ?>
            <h3>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h3>
            <a href="main.php?logout='1'">Logout</a>
        <?php endif ?>
        
    </body>

</html>
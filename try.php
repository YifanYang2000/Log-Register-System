<?php include 'server.php' ?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Register</h2>
        </div>

        <form action="try.php" method="post">
            <?php include 'errors.php' ?>
            <div>
                <label for="username">Username: </label><br>
                <input type="text" name="username" required>
            </div>
            <br>
            <div>
                <label for="email">Email: </label><br>
                <input type="email" name="email" required>
            </div>
            <br>
            <div>
                <label for="password">Password: </label><br>
                <input type="password" name="password_1" required>
            </div>
            <br>
            <div>
                <label for="password">Confirm Password: </label><br>
                <input type="password" name="password_2" required>
            </div>

            <br>
            <button type="submit" name="reg_user"> Confirm </button>

            <p>Already a user? <a href="login.php"><b>Sign In Here</b></a></p>
        </form>
    </div>
</body>

</html>
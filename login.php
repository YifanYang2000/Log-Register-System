<?php include 'server.php' ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Sign In</h2>
        </div>

        <form action="login.php" method="post">
            <?php include 'errors.php' ?>
            <div>
                <label for="username">Username: </label><br>
                <input type="text" name="username" required>
            </div>
            <br>
            <div>
                <label for="password">Password: </label><br>
                <input type="password" name="password_1" required>
            </div>

            <br>
            <button type="submit" name="login_user"> Login </button>

            <p>Not a user? <a href="try.php"><b>Register Here</b></a></p>
        </form>
    </div>
</body>
</html>
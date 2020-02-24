<?php

session_start();

//initialising variables

$errors = array();


//connect to db
$db = mysqli_connect('localhost', 'root', '', 'login') or die("Could not connect to database");
 

//register users

if(isset($_POST['reg_user'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


    //form validation

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    if (empty($email)) {
        array_push($errors, "Email is required");
    }

    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }

    if ($password_1 != $password_2) {
        array_push($errors, "Passwords do not match");
    }


    // check db for existing user with the same username

    $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $username){array_push($errors, "Username already exists");}
        if ($user['email'] === $email){array_push($errors, "An account is already linked to this email");}
    }

    //register user if no error

    if (count($errors) == 0) {
        $password = md5($password_1);
        $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('Location: main.php');
    }

}


//log in user

if(isset($_POST['login_user'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

    if(empty($username)) {
        array_push($errors, "Username is required");
    }

    if(empty($password_1)) {
        array_push($errors, "Password is required");
    }

    if(count($errors) == 0) {
        $password = md5($password_1);
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results)) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Logged in successfully";
            header('Location: main.php');
        } else {
            array_push($errors, "Wrong combinations of Username and Password, please try again.");
        }
    }
}

?>
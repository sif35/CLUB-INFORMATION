<?php

if (isset($_POST['submit-signup'])) {

    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $pwd = htmlspecialchars($_POST['password']);


    // Instantiate Signup Controller class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignUpContr($firstname, $lastname, $username, $email, $pwd);

    // Running error handlers and signup
    $signup->signupUser();

    // Go back to front page
    header("location: ../../html/signup.php?error=none");
}
else {
    header("location: ../../html/signup.php");
    exit();
}
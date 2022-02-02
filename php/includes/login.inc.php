<?php

if (isset($_POST['submit-login'])) {

    $username = htmlspecialchars($_POST['username']);
    $pwd = htmlspecialchars($_POST['password']);


    // Instantiate Login Controller class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($username, $pwd);

    // Running error handlers and login
    $login->loginUser();

    // Go back to front page
    header("location: ../../html/login.php?error=none");
}
else {
    header("location: ../../html/login-php");
    exit();
}
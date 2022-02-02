<?php
    session_start();
    include "header.php";
    if (isset($_SESSION['userUserName'])) {
        header("location: home-page.php?user={$_SESSION['userUserName']}");
        exit();
    }
?>

<section class="section-login-register">

    <div class="login-box">
        <a href="#" class="login-box__button-login">Login</a>

        <form id="login-form" method="post" action="../php/includes/login.inc.php" class="login-form">

            <div class="login-form__control">

                <label for="emailAddress" class="login-form__control--label">Username</label><br>
                <input type="text" name="username" id="login-email" class="login-form__control--email-field" placeholder="E-mail"><br>
                <div class="login-form__control--error-message d-flex justify-content-end" id="error-element-email">Error Message</div>

            </div>

            <div class="login-form__control">

                <label for="password" class="login-form__control--label">Password</label><br>
                <input id="login-password" name="password" type="password" class="login-form__control--password-field" placeholder="Password"><br>
                <div class="login-form__control--error-message d-flex justify-content-end" id="error-element-password">Error Message</div>
                <input type="submit" id="submit-button" name="submit-login" class="login-button text-center">

            </div>

        </form>
    </div>

</section>

<?php include "footer.php";?>

<script src="../javascript/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/00eae9c8e2.js" crossorigin="anonymous"></script>
<!-- <script src="../javascript/login.js"></script> -->

</body>

</html>
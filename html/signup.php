<?php
    session_start();
    include "header.php";
    if (isset($_SESSION['userUserName'])) {
        header("location: home-page.php?user={$_SESSION['userUserName']}");
        exit();
    }
?>

<section class="section-login-register">

    <div class="signup-box">
        <a href="#" class="signup-box__button-signup">Signup</a>

        <form id="signup-form" method="post" action="../php/includes/signup.inc.php" class="signup-form">

            <div class="column">
                <div class="signup-form__control firstname">

                    <label for="emailAddress" class="signup-form__control--label">First Name</label><br>
                    <input type="text" name="firstname" id="signup-email" class="signup-form__control--email-field" placeholder="First Name"><br>

                </div>

                <div class="signup-form__control lastname">

                    <label for="emailAddress" class="signup-form__control--label">Last Name</label><br>
                    <input type="text" name="lastname" id="signup-email" class="signup-form__control--email-field" placeholder="Last Name"><br>

                </div>
            </div>

            <div class="signup-form__control lastname">

                <label for="emailAddress" class="signup-form__control--label">Username</label><br>
                <input type="text" name="username" id="signup-email" class="signup-form__control--email-field" placeholder="username"><br>

            </div>

            <div class="signup-form__control">

                <label for="emailAddress" class="signup-form__control--label">E-mail</label><br>
                <input type="text" name="email" id="signup-email" class="signup-form__control--email-field" placeholder="E-mail"><br>

            </div>

            <div class="signup-form__control">

                <label for="password" class="signup-form__control--label">Password</label><br>
                <input id="signup-password" name="password" type="password" class="signup-form__control--password-field" placeholder="Password"><br>
                <input type="submit" id="submit-button" name="submit-signup" value="Signup" class="login-button text-center">

            </div>

        </form>
    </div>

</section>

<?php include "footer.php";?> 

<script src="../javascript/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/00eae9c8e2.js" crossorigin="anonymous"></script>
<script src="../javascript/login.js"></script>

</body>

</html>
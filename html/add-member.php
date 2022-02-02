<?php
    session_start();
    include "header.php";

?>

<section class="section-add-event">

    <div class="add-event-box">
        <a href="#" class="login-box__button-login">Add Member</a>

        <form id="login-form" method="post" action="../php/save-member.php" class="add-event-form" enctype="multipart/form-data">
            
            <div class="column">
                <div class="mb-3 firstname">
                    <label for="exampleFormControlInput1" class="form-label">First Name</label>
                    <input name="firstname" type="text" class="form-control form-control-lg" id="exampleFormControlInput1">
                </div>
                <div class="mb-3 lastname">
                    <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                    <input name="lastname" type="text" class="form-control form-control-lg" id="exampleFormControlInput1">
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Designation</label>
                <input name="designation" type="text" class="form-control form-control-lg" id="exampleFormControlInput1">
            </div>

            <div class="column">
                <div class="mb-3 firstname">
                    <label for="exampleFormControlInput1" class="form-label">Dept.</label>
                    <input name="dept" type="text" class="form-control form-control-lg" id="exampleFormControlInput1">
                </div>
                <div class="mb-3 lastname">
                    <label for="exampleFormControlInput1" class="form-label">Batch</label>
                    <input name="batch" type="text" class="form-control form-control-lg" id="exampleFormControlInput1">
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                <input name="email" type="email" class="form-control form-control-lg" id="exampleFormControlInput1">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Phone no.</label>
                <input name="phone" type="number" class="form-control form-control-lg" id="exampleFormControlInput1">
            </div>
            <input type="submit" id="submit-button" name="submit-login" class="login-button">
        </form>
    </div>

</section>

<?php include "footer.php";?>
    
<script src="../javascript/bootstrap.bundle.min.js"></script>
<script src="../javascript/dashboard.js"></script>
</body>

</html>
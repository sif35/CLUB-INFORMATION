<?php
    session_start();
    include "header.php";

?>

<section class="section-add-event">

    <div class="add-event-box">
        <a href="#" class="login-box__button-login">Add event</a>

        <form id="login-form" method="post" action="../php/post-handling/save-event.php" class="add-event-form" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input name="event_title" type="text" class="form-control form-control-lg" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Event Tag</label>
                <input name="event_tag" type="text" class="form-control form-control-lg" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea name="event_description" class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Event image</label>
                <input name="event_image" class="form-control" type="file" id="formFile">
            </div>
            <input type="submit" id="submit-button" name="submit-login" class="login-button">
        </form>
    </div>

</section>

    <?php include"footer.php";?>

<script src="../javascript/bootstrap.bundle.min.js"></script>
<script src="../javascript/dashboard.js"></script>
</body>

</html>
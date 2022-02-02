<?php
    session_start();
    include "header.php";
?>

<section class="section-add-event">

    <div class="add-event-box">
        <a href="#" class="login-box__button-login">Edit event</a>

        <?php
            include "../php/dbConnect.php";

            $event_id = $_GET['id'];
            $sql = "SELECT * FROM events WHERE events_id=?";

            $stmt = $dbh->prepare($sql);
            $stmt->bind_param("s", $event_id);
            $stmt->execute();
            $result = $stmt->get_result();

            $data = $result->fetch_assoc();
        ?>

        <form id="login-form" method="post" action="../php/post-handling/save-updated-event.php" class="add-event-form" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input value="<?php echo $data['title'];?>" name="event_title" type="text" class="form-control form-control-lg" id="exampleFormControlInput1">
                <input type="hidden" name="event_id" value="<?php echo $_GET['id'];?>" id="hidden-input">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Event Tag</label>
                <input value="<?php echo $data['tag']?>" name="event_tag" type="text" class="form-control form-control-lg" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea name="event_description" class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3">
                    <?php echo $data['info']?>
                </textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Event image</label>
                <input name="new-image" class="form-control" type="file" id="formFile">
                <input type="hidden" name="old-image" value="<?php echo $data['events_img'];?>">
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
<?php
    session_start();
    include "header.php";
?>

<main>
    <section class="event">
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
        <div class="event__image-container">
            <img src="../resources/Events/<?php echo $data['events_img'];?>" alt="<?php echo $data['events_img']?>" class="event__image">
        </div>
        <div class="event__details">
            <h1 class="event__title"><?php echo $data['title']?></h1>
            <span class="event__date"><i class="fas fa-calendar alt"></i><?php echo $data['events_date']?></span>
            <p class="event__text"><?php echo $data['info']?></p>
        </div>
    </section>
</main>

<?php include "footer.php";?>

<script src="../javascript/bootstrap.bundle.min.js"></script>
<script src="../javascript/dashboard.js"></script>

</body>

</html>
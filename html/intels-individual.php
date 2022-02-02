<?php
    session_start();
    include "header.php";
?>

<main>
    <section class="intel">
        <?php
            include "../php/dbConnect.php";
            
            $intels_id = $_GET['id'];
            $sql = "SELECT * FROM intels WHERE intels_id=?";

            $stmt = $dbh->prepare($sql);
            $stmt->bind_param("s", $intels_id);
            $stmt->execute();
            $result = $stmt->get_result();

            $data = $result->fetch_assoc();

        ?>
        <div class="intel__image-container">
            <img src="../resources/Intels/<?php echo $data['intels_img']?>" alt="<?php echo $data['intels_img']?>" class="intel__image">
        </div>
        <div class="intel__details">
            <h1 class="intel__title"><?php echo $data['title']?></h1>
            <span class="intel__date"><i class="fas fa-calendar alt"></i><?php echo $data['intels_date']?></span>
            <p class="intel__text"><?php echo $data['info']?></p>
        </div>
    </section>
</main>

<?php include "footer.php";?>

<script src="../javascript/bootstrap.bundle.min.js"></script>
<script src="../javascript/dashboard.js"></script>

</body>

</html>
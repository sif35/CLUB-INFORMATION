<?php
    session_start();
    include "header.php";
?>

<main>
    <h1 class="section-title-2">
        <span class="section-title--main">Cyborg Events</span>
    </h1>
    <section class="intels">
        <div class="intels__main">
            <?php
                include "../php/dbConnect.php";

                $sql = "SELECT * FROM intels";

                $result = $dbh->query($sql);

                    if ($result->num_rows > 0) {
                        $i = 0;
                        while ($row = $result->fetch_assoc()) {
                            $i = $i + 1;
                            if ($i == 5) {
                                break;
                            }
            ?>
            <div class="intels__main--intels-card">
                <div class="intels__main--intels-image-data">
                    <img <?php echo "src='../resources/Intels/{$row['intels_img']}'"?> class="intels__main--intels-background-image"
                    alt="<?php echo "{$row['intels_img']}"?>">
                </div>
                <div class="intels__main--intels-info">
                    <a href="intels-individual.php?id=<?php echo $row['intels_id']?>"><h1 class="intels__main--intels-title"><?php echo $row['title']?></h1></a>
                    <div class="intels__main--intels-publication-details">
                        <a href="" class="intels__main--intels-author"><i class="fas fa-user"></i><?php echo $row['author']?></a>
                        <span class="intels__main--intels-date"><i class="fas fa-calendar alt"></i><?php echo $row['intels_date']?></span>
                    </div>
                    <p class="intels__main--intels-description"><?php echo substr($row['info'], 0, 130) . "..."?>
                    </p>
                    <div class="intels__main--intels-tag">
                        <a><?php echo $row['tag']?></a>
                    </div>
                    <div class="intels__main--intels-cta">
                        <a href="intels-individual.php?id=<?php echo $row['intels_id']?>">Read more &rarr;</a>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>

        <!-- Left Side Intels -->
        <div class="intels__shortcut">
            <a href="#">
                <?php
                    include "../php/dbConnect.php";

                    $sql = "SELECT * FROM intels";

                    $result = $dbh->query($sql);

                        if ($result->num_rows > 0) {
                            $i = 0;
                            while ($row = $result->fetch_assoc()) {
                                $i = $i + 1;
                                if ($i == 5) {
                                    break;
                                }
                ?>
            <div class="intels__shortcut--intels-card">
                    <div class="intels__shortcut--intels-image-data">
                        <img <?php echo "src='../resources/Intels/{$row['intels_img']}'"?> class="intels__shortcut--intels-background-image" alt="<?php echo "{$row['intels_img']}"?>">
                    </div>
                    <div class="intels__shortcut--intels-info">
                        <h1 class="intels__shortcut--intels-title"><?php echo $row['title']?></h1>
                        <span class="intels__shortcut--intels-date"><i class="fas fa-calendar alt"></i><?php echo $row['intels_date']?></span>
                    </div>
                </div>
            </a>
            <?php
                    }
                }
            ?>
        </div>
    </section>
</main>

<?php include"footer.php";?>
    
<script src="../javascript/bootstrap.bundle.min.js"></script>
<script src="../javascript/dashboard.js"></script>
</body>

</html>
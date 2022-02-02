<?php
    session_start();
    include "header.php";

?>

<section class="section-intro">

    <div class="intro">
        <video class="intro__bg-video d-flex justify-content-center" preload="none" autoplay muted loop
            disablepictureinpicture>
            <source src="../resources/KUET_CYBORG_INTRO.mp4" type="video/mp4">
            Your browser is not supported!
        </video>
    </div>

</section>

<section class="section-cyborg-intels">
    <h1 class="section-title">
        <span class="section-title--main"><a href="intels-page.php"> Cyborg Intels</a></span>
    </h1>
    <?php
        include "../php/dbConnect.php";

        $sql = "SELECT * FROM intels";

        $result = $dbh->query($sql);

            if ($result->num_rows > 0) {
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $i = $i + 1;
                    if ($i > 2) {
                        break;
                    }
    ?>
    <div class="home-intels">
        <div class="cyborg-intels__main--intels-card">
            <div class="cyborg-intels__main--intels-image-data">
                <img <?php echo "src='../resources/Intels/{$row['intels_img']}'"?> class="cyborg-intels__main--intels-background-image"
                alt="<?php echo "{$row['intels_img']}"?>">
            </div>
            <div class="cyborg-intels__main--intels-info">
                <a href="cyborg-intels-individual.php?id=<?php echo $row['intels_id']?>"><h1 class="cyborg-intels__main--intels-title"><?php echo $row['title']?></h1></a>
                <div class="cyborg-intels__main--intels-publication-details">
                    <a href="" class="cyborg-intels__main--intels-author"><i class="fas fa-user"></i><?php echo $row['author']?></a>
                    <span class="cyborg-intels__main--intels-date"><i class="fas fa-calendar alt"></i><?php echo $row['intels_date']?></span>
                </div>
                <p class="cyborg-intels__main--intels-description"><?php echo substr($row['info'], 0, 130) . "..."?>
                </p>
                <div class="cyborg-intels__main--intels-tag">
                    <a><?php echo $row['tag']?></a>
                </div>
                <div class="cyborg-intels__main--intels-cta">
                    <a href="intels-individual.php?id=<?php echo $row['intels_id']?>">Read more &rarr;</a>
                </div>
            </div>
        </div>    
    </div>
    <?php
            }
        }
    ?>
    
</section>


<section class="section-teams">
<h1 class="section-title">
    <span class="section-title--main">Cyborg Teams</span>
</h1>
    <div class="cyborg-teams">
        <h3 class="cyborg-teams__tag">VALORANT Teams</h3>
        <div class="cyborg-teams__container">
            <div class="row">
                <div class="cyborg-teams__img-container col-md-6">
                    <img src="../resources/KC_Primus.jpg" alt="KC_Primus" class="cyborg-teams__img">
                    <h2 class="cyborg-teams__name">KUET Cyborg Primus</h2>
                </div>
                <div class="cyborg-teams__img-container col-md-6">
                    <img src="../resources/KC_Ironhide.jpg" alt="KC_Ironhide" class="cyborg-teams__img">
                    <h2 class="cyborg-teams__name">KUET Cyborg Ironhide</h2>
                </div>
                <div class="cyborg-teams__img-container col-md-6 ms-auto me-auto">
                    <img src="../resources/KC_Ultron.jpg" alt="KC_Ultron" class="cyborg-teams__img">
                    <h2 class="cyborg-teams__name">KUET Cyborg Ultron</h2>
                </div>
            </div>
        </div>
        <h3 class="cyborg-teams__tag">PUBG Teams</h3>
        <div class="cyborg-teams__container col-lg-6 ms-auto me-auto">
            <div class="cyborg-teams__img-container">
                <img src="../resources/K-19.jpg" alt="K-19" class="cyborg-teams__img">
                <h2 class="cyborg-teams__name">K-19</h2>
            </div>
        </div>
    </div>
</section>



<section class="section-cyborg-events">
    <div class="events">
        <div class="row">
            <?php
                include "../php/dbConnect.php";

                $sql = "SELECT * FROM events";
                $result = $dbh->query($sql);

                if ($result->num_rows > 0) {
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $i = $i + 1;
                        if ($i > 3) {
                            break;
                        }
            ?>
            <div class="col-lg-4">
                <div class="events-card">
                    <div class="events__image-container">
                        <img <?php echo "src='../resources/Events/{$row['events_img']}'"?> alt="<?php echo "{$row['events_img']}"?>" class="events__image">
                    </div>
                    <div class="events__title">
                    <a href="events-individual.php?id=<?php echo $row['events_id']?>"><?php echo "{$row['title']}"?></a>
                    </div>
                    <div class="events__details">
                        <a href="#" class="events__details--category"><?php echo "{$row['tag']}"?></a>
                        <a href="" class="events__details--date"><?php echo "{$row['events_date']}"?></a>
                        <p class="events__details--text"><?php echo substr($row['info'], 0, 130) . "..."?></p>
                    </div>
                </div>
            </div>
            <?php
                                }
                            }
                        ?>
        </div>
        <a href="events-page.php" class="read_more-button">All Events &rarr;</a>
    </div>
</section>

<?php include"footer.php";?>
    

<script src="../javascript/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/00eae9c8e2.js" crossorigin="anonymous"></script>

</body>

</html>
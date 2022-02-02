<?php
    session_start();
    include "header.php";
?>

<main>
<h1 class="section-title-2">
<span class="section-title--main">Cyborg Events</span>
</h1>
<section class="section-events">
    <div class="cyborg-events">

        <div class="cyborg-events__main">
            <div class="row">
                <?php
                    include "../php/dbConnect.php";

                    $sql = "SELECT * FROM events";
                    $result = $dbh->query($sql);

                    if ($result->num_rows > 0) {
                        $i = 0;
                        while ($row = $result->fetch_assoc()) {
                            $i = $i + 1;
                            if ($i == 6) {
                                break;
                            }
                ?>
                <div class="col-lg-6">
                    <div class="cyborg-events__main--card">
                        <div class="cyborg-events__main--image-container">
                            <img <?php echo "src='../resources/Events/{$row['events_img']}'"?> alt="<?php echo "{$row['events_img']}"?>" class="cyborg-events__main--image">
                        </div>
                        <div class="cyborg-events__main--title">
                            <a href="events-individual.php?id=<?php echo $row['events_id']?>"><?php echo "{$row['title']}"?></a>
                        </div>
                        <div class="cyborg-events__main--details">
                            <a href="#" class="cyborg-events__main--details-category"><?php echo "{$row['tag']}"?></a>
                            <a href="" class="cyborg-events__main--details-date"><?php echo "{$row['events_date']}"?></a>
                            <p class="cyborg-events__main--details-text"><?php echo substr($row['info'], 0, 130) . "..."?></p>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
        <div class="cyborg-events__shortcut">
            
            <a href="#">
            <?php
                include "../php/dbConnect.php";

                $sql = "SELECT * FROM events";
                $result = $dbh->query($sql);

                if ($result->num_rows > 0) {
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $i = $i + 1;
                        if ($i == 5) {
                            break;
                        }

            ?>
                <div class="cyborg-events__shortcut--card">
                    <div class="cyborg-events__shortcut--image-data">
                        <img <?php echo "src='../resources/Events/{$row['events_img']}'"?> class="cyborg-events__shortcut--background-image" alt="<?php echo "{$row['events_img']}"?>"></img>
                    </div>
                    <div class="cyborg-events__shortcut--info">
                        <h1 class="cyborg-events__shortcut--title"><?php echo "{$row['title']}"?></h1>
                        <span class="cyborg-events__shortcut--date"><i class="fas fa-calendar alt"></i><?php echo "{$row['events_date']}"?></span>
                    </div>
                </div>
                <?php
                }
            }
        ?>
            </a>
            
        </div>
        
    </div>
</section>
</main>

<?php include"footer.php";?>
    
<script src="../javascript/bootstrap.bundle.min.js"></script>
<script src="../javascript/dashboard.js"></script>
</body>

</html>
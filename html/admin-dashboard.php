<?php
    session_start();
    include "header.php";
    if (!isset($_SESSION['userUserName'])) {
        header("location: home-page.php?erroraccess");
        exit();
    }
?>

<main>
    <section class="dashboard">

        <div class="dashboard__card-container row gx-5">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <button href="event-dashboard" id="event-dashboard" class="dashboard__card dashboard__active">
                    <div class="dashboard__card--inner">
                        <h1 class="dashboard__card--inner-number">
                            <?php
                                include "../php/dbConnect.php";

                                $sql = "SELECT post FROM category WHERE category_id=34;";


                                $result = $dbh->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo "{$row['post']}";
                                }
                            ?>
                            <span class="dashboard__card--inner-icon"><i class="fa-regular fa-calendar-days"></i></span>
                        </h1>
                        <span class="dashboard__card--inner-name">Events</span>
                    </div>
                </button>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <button id="intel-dashboard" class="dashboard__card">
                    <div class="dashboard__card--inner">
                        <h1 class="dashboard__card--inner-number">
                        <?php
                                include "../php/dbConnect.php";

                                $sql = "SELECT post FROM category WHERE category_id=31;";


                                $result = $dbh->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo "{$row['post']}";
                                }
                            ?>
                            <span class="dashboard__card--inner-icon"><i class="fa-regular fa-newspaper"></i></span>
                        </h1>
                        <span class="dashboard__card--inner-name">Intels</span>
                    </div>
                </button>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <button id="member-dashboard" class="dashboard__card">
                    <div class="dashboard__card--inner">
                        <h1 class="dashboard__card--inner-number">
                            <?php
                                include "../php/dbConnect.php";

                                $sql = "SELECT * FROM members;";

                                $result = $dbh->query($sql);
                                echo "{$result->num_rows}";
                            ?>
                            <span class="dashboard__card--inner-icon"><i class="fa-solid fa-person"></i></span>
                        </h1>
                        <span class="dashboard__card--inner-name">Members</span>
                    </div>
                </button>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <button id="admin-dashboard" class="dashboard__card">
                    <div class="dashboard__card--inner">
                        <h1 class="dashboard__card--inner-number">
                            <?php
                                include "../php/dbConnect.php";

                                $sql = "SELECT * FROM users;";

                                $result = $dbh->query($sql);
                                echo "{$result->num_rows}";
                            ?>
                            <span class="dashboard__card--inner-icon"><i class="fa-solid fa-lock"></i></span>
                        </h1>
                        <span class="dashboard__card--inner-name">Admins</span>
                    </div>
                </button>
            </div>
        </div>





        <!-- Events -->
        <div id="events" class="event-box">
            <div class="event-box__header">
                <h1>Event Title</h1>
                <span class="event-box__header--tag">Tag</span>
                <span class="event-box__header--date"><i class="fa-regular fa-calendar-days"></i> Date</span>
                <span class="event-box__header--edit">Edit</span>
                <span class="event-box__header--delete">Delete</span>
            </div><hr>
            <div class="event-box__inside">
                    <?php
                        include "../php/dbConnect.php";

                        $sql = "SELECT * FROM events";
                        $result = $dbh->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                    ?>
                    <div class="event-box__inside-event">
                        <a href=""><h1><?php echo"{$row['title']}"?></h1></a>
                        <span class="event-box__inside-event--tag"><?php echo"{$row['tag']}"?></span>
                        <span class="event-box__inside-event--date"><?php echo"{$row['events_date']}"?></span>
                        <span class="event-box__inside-event--edit"><a href="edit-event.php?id=<?php echo $row['events_id']?>"><i class="fa-regular fa-pen-to-square"></i></a></span>
                        <span class="event-box__inside-event--delete"><a href="../php/post-handling/delete-event-inc.php?id=<?php echo $row['events_id']?>&catid=<?php echo $row['category']?>"><i class="fa-solid fa-trash-can"></i></a></span>
                    </div>
                <?php
                            }
                        }
                ?>
            </div>
            <div class="event-box__button">
                <a class="login-button add-button" href="add-event.php">Add Event</a>
            </div>
        </div>

        <!-- Intels -->
        <div id="intels" class="intel-box">
            <div class="intel-box__header">
                <h1>Intel Title</h1>
                <span class="intel-box__header--tag">Tag</span>
                <span class="intel-box__header--date"><i class="fa-regular fa-calendar-days"></i> Date</span>
                <span class="intel-box__header--edit">Edit</span>
                <span class="intel-box__header--delete">Delete</span>
            </div><hr>
            <div class="intel-box__inside">
                <?php
                    include "../php/dbConnect.php";

                    $sql = "SELECT * FROM intels;";
                    $result = $dbh->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="intel-box__inside-intel">
                        <a href=""><h1><?php echo"{$row['title']}"?></h1></a>
                        <span class="intel-box__inside-intel--tag"><?php echo"{$row['tag']}"?></span>
                        <span class="intel-box__inside-intel--date"><?php echo"{$row['intels_date']}"?></span>
                        <span class="intel-box__inside-intel--edit"><a href="edit-intels.php?id=<?php echo $row['intels_id']?>"><i class="fa-regular fa-pen-to-square"></i></a></span>
                        <span class="intel-box__inside-intel--delete"><a href="../php/post-handling/delete-intels-inc.php?id=<?php echo $row['intels_id']?>&catid=<?php echo $row['category']?>"><i class="fa-solid fa-trash-can"></i></a></span>
                    </div>
                <?php
                        }
                    }
                ?>
            </div>
            <div class="event-box__button">
                <a class="login-button add-button" href="add-intels.php">Add Intel</a>
            </div>
        </div>

        <!-- Members -->
        <div id="members" class="member-box">
            <div class="member-box__header">
                <h1>Name</h1>
                <span class="member-box__header--tag">Designation</span>
                <span class="member-box__header--date">Batch</span>
            </div><hr>
            <div class="member-box__inside">
                <?php
                    include "../php/dbConnect.php";

                    $sql = "SELECT * FROM members;";
                    $result = $dbh->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                <a href="">
                    <div class="member-box__inside-member">
                        <h1><?php echo"{$row['firstname']}. {$row['lastname']}"?></h1>
                        <span class="member-box__inside-member--tag"><?php echo "{$row['designation']}"?></span>
                        <span class="member-box__inside-member--date"><?php echo "{$row['batch']}"?></span>
                    </div>
                </a>
                <?php
                        }
                    }
                ?>
            </div>
            <div class="event-box__button">
                <a class="login-button add-button" href="add-member.php">Add Member</a>
            </div>
        </div>

        <!-- Admins -->
        <div id="admins" class="admin-box">
            <div class="admin-box__header">
                <h1>Name</h1>
                <span class="admin-box__header--tag">userid</span>
                <span class="admin-box__header--date">E-mail</span>
            </div><hr>
            <div class="admin-box__inside">
                <?php
                    include "../php/dbConnect.php";

                    $sql = "SELECT * FROM users;";
                    $result = $dbh->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                <a href="">
                    <div class="admin-box__inside-admin">
                        <h1><?php echo"{$row['firstname']}. {$row['lastname']}"?></h1>
                        <span class="admin-box__inside-admin--tag"><?php echo "{$row['username']}"?></span>
                        <span class="admin-box__inside-admin--date"><?php echo "{$row['email']}"?></span>
                    </div>
                </a>
                <?php
                        }
                    }
                    
                ?>
            </div>
        </div>
    </section>
</main>

<script src="../javascript/bootstrap.bundle.min.js"></script>
<script src="../javascript/dashboard.js"></script>

</body>

</html>
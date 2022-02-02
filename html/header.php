<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../resources/LOGO_OFFICIAL.png" type="image/png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/b7ad1e7c7a.js" crossorigin="anonymous"></script>
    <title>Cyborg</title>
</head>

<body>

<header>
<section class="section-navigation-bar">

    <nav class="navbar navbar-expand-lg cyborg-navbar">
        <div class="container-fluid cyborg-navbar__container">
            <a class="navbar-brand cyborg-navbar__brand" href="home-page.php">
                <img src="../resources/LOGO_OFFICIAL.png" alt="" class="cyborg-navbar__logo d-inline-block align-text-top">
            </a>
            <button button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <span class=""><i class="fa-solid fa-circle-chevron-down cyborg-navbar__toggler-icon"></i></span>
            </button>
            <div class="collapse navbar-collapse cyborg-navbar__list-container" id="navbarNavAltMarkup">
                <ul class="navbar-nav  cyborg-navbar__list">
                    <li class="nav-item cyborg-navbar__list-item">
                        <a class="nav-link active" aria-current="page" href="home-page.php">Home</a>
                    </li>
                    <li class="nav-item cyborg-navbar__list-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item cyborg-navbar__list-item">
                        <a href="events-page.php" class="nav-link" >Events</a>
                    </li>
                    <li class="nav-item cyborg-navbar__list-item">
                        <a href="intels-page.php" class="nav-link" >Intels</a>
                    </li>
                    <?php
                        if (isset($_SESSION['userUserName'])) 
                        {
                    ?>
                    
                    <li class="cyborg-navbar__dropdown nav-item dropdown">
                        <a class="cyborg-navbar__dropdown-link nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['userUserName'];?>
                        </a>
                        <ul class="cyborg-navbar__dropdown-menu dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="cyborg-navbar__dropdown-item dropdown-item" href="admin-dashboard.php">Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="cyborg-navbar__dropdown-item dropdown-item" href="../php/includes/logout.inc.php">Logout</a></li>
                        </ul>
                    </li> 
                    <?php 
                        }
                        else
                        {
                    ?>
                        <li class="nav-item cyborg-navbar__list-item">
                            <a href="login.php" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item cyborg-navbar__list-item">
                            <a href="signup.php" class="nav-link">Signup</a>
                        </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

</section>

</header>
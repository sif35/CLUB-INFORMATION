<?php

include "../dbConnect.php";

session_start();

if (isset($_FILES['intel_image'])){
    $errors = array();

    $filename = $_FILES['intel_image']['name'];
    $filesize = $_FILES['intel_image']['size'];
    $filetmp = $_FILES['intel_image']['tmp_name'];
    $filetype = $_FILES['intel_image']['type'];
    $tmp = explode('.',$filename);
    $fileext = end($tmp);
    $extensions = array("jpeg", "jpg", "png");

    if (in_array($fileext, $extensions) === false) {
        $errors[] = "This extension file is not allowed";
    }

    if($filesize > 2097152) {
        $errors[] = "File size must be 2MB or lower";
    }

    if (empty($errors) == true) {
        move_uploaded_file($filetmp, "../../resources/Intels".$filename);
    } else {
        print_r($errors);
        die();
    }
}

$title = $dbh->real_escape_string($_POST['intel_title']);
$description = $_POST['intel_description'];
$tag = strtoupper($dbh->real_escape_string($_POST['intel_tag']));
$category = 31;
$author = $_SESSION['userUserName'];
$date = date("d F, Y");

$sql_insert = "INSERT INTO intels (title, info, category, tag, author, intels_date, intels_img) VALUES(?, ?, ?, ?, ?, ?, ?);";

if ($stmt_insert = $dbh->prepare($sql_insert)) {
    $stmt_insert->bind_param("sssssss", $title, $description, $category, $tag, $author, $date, $filename);
    $stmt_insert->execute();
} else {
    header("location: ../../html/add-intel.php?error=stmtpreparefailed1");
    die();
}

$sql_update = "UPDATE category SET post = post + 1 WHERE category_id = ?;";

if ($stmt_update = $dbh->prepare($sql_update)) {
    $stmt_update->bind_param("s", $category);
    $stmt_update->execute();
} else {
    header("location: ../../html/add-intel.php?error=stmtpreparefailed1");
    die();
}

header("location: ../../html/admin-dashboard.php");

mysqli_stmt_close($stmt);
mysqli_close($dbh);

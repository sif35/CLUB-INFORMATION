<?php

include "../dbConnect.php";

session_start();

if (empty($_FILES['new-image']['name'])) {
    $filename = $_POST['old-image'];
} else {
    $errors = array();

    $filename = $_FILES['new-image']['name'];
    $filesize = $_FILES['new-image']['size'];
    $filetmp = $_FILES['new-image']['tmp_name'];
    $filetype = $_FILES['new-image']['type'];
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
        move_uploaded_file($filetmp, "../../resources/Events".$filename);
    } else {
        print_r($errors);
        die();
    }
}

$title = $dbh->real_escape_string($_POST['event_title']);
$description = $_POST['event_description'];
$tag = strtoupper($dbh->real_escape_string($_POST['event_tag']));
$author = $_SESSION['userUserName'];
$date = date("d F, Y");
$events_id = $_POST['event_id'];

$sql = "UPDATE events SET title=?, info=?, tag=?, author=?,  events_date=?, events_img=?
WHERE events_id=?;";

echo $_GET['id'];

$stmt = $dbh->prepare($sql);
$stmt->bind_param("sssssss", $title, $description, $tag, $author, $date, $filename, $events_id);

$stmt->execute();

header("location: ../../html/admin-dashboard.php?eventupdatsuccess");

mysqli_stmt_close($stmt);
mysqli_close($dbh);

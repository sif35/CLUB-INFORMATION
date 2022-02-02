<?php

include "dbConnect.php";

session_start();

$firstname = $dbh->real_escape_string($_POST['firstname']);
$lastname = $dbh->real_escape_string($_POST['lastname']);
$designation = $dbh->real_escape_string($_POST['designation']);
$dept = $dbh->real_escape_string($_POST['dept']);
$batch = $dbh->real_escape_string($_POST['batch']);
$email = $dbh->real_escape_string($_POST['email']);
$phone = $dbh->real_escape_string($_POST['phone']);

$sql_insert = "INSERT INTO members (firstname, lastname, designation, dept, batch, email, phone) VALUES(?, ?, ?, ?, ?, ?, ?);";

if ($stmt_insert = $dbh->prepare($sql_insert)) {
    $stmt_insert->bind_param("sssssss", $firstname, $lastname, $designation, $dept, $batch, $email, $phone);
    $stmt_insert->execute();
} else {
    header("location: ../html/add-intel.php?error=stmtpreparefailed1");
    die();
}

header("location: ../html/admin-dashboard.php");

mysqli_stmt_close($stmt);
mysqli_close($dbh);

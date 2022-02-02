<?php

include "../dbConnect.php";

$sql = "DELETE FROM events WHERE events_id = ?;";

if ($stmt = $dbh->prepare($sql)) {
    $stmt->bind_param("s", $_GET['id']);
    $stmt->execute();
} else{
    header("location: ../../../../html/admin-dashboard.php?error=stmtfailed1");
    exit();
}

mysqli_stmt_close($stmt);

$sql = "UPDATE category SET post = post - 1 WHERE category_id = ?;";

if ($stmt = $dbh->prepare($sql)) {
    $stmt->bind_param("s", $_GET['catid']);
    echo $_GET['catid'];
    $stmt->execute();
} else{
    header("location: ../../html/admin-dashboard.php?error=stmtfailederror2");
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($dbh);

header("location: ../../html/admin-dashboard.php?eventdeleted");
exit();
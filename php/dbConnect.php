<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cyborgdb";

$dbh = new mysqli($servername, $username, $password, $dbname);

if ($dbh->connect_errno) {
    die("Connection failed: ".$dbh->connect_error);
}
<?php

class Dbh {

    protected function connect () {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cyborgdb";

        // $dbh = new PDO('mysql:host=localhost;dbname=cyborgdb', $username, $password);

        $dbh = new mysqli($servername, $username, $password, $dbname);

        if ($dbh->connect_errno) {
            die("Connection failed: ".$dbh->connect_error);
        }
        return $dbh;
    }

}
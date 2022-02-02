<?php


class Signup extends Dbh {

    protected function setUser($firstname, $lastname, $username, $email, $pwd) {

        $conn = $this->connect();

        $sql = "INSERT INTO users (firstname, lastname, username, email, password)
        VALUES (?, ?, ?, ?, ?);";

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssss", $firstname, $lastname, $username, $email, $hashedPwd);
            $stmt->execute();
        }
        else {
            header("location: ../../../../html/signup.php?error=sqlfailedforinsert");
            exit();
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }

    protected function checkUser($username, $email) {

        $conn = $this->connect();
        $resultCheck = false;

        $sql = "SELECT user_no FROM users WHERE username=? OR email=?;";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $firstname, $lastname);
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            header("location: ../../../../html/signup.php?error=sqlfailedoncheckinguseroremail");
            exit();
        }
        else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
    
}

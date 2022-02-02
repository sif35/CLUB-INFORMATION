<?php

class Login extends Dbh {

    protected function getUser($username, $pwd) {

        $conn = $this->connect();
        
        $sql = "SELECT password FROM users WHERE username = ? OR email = ?;";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $pwd);
        // $result = $conn->query($sql);
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result

        if ($result->num_rows == 0) {
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header("location: ../../html/login.php?error=usernotfound");
            exit();
        }
        else {
            $row = $result->fetch_assoc();
            $checkPwd = password_verify($pwd, $row["password"]);

            if ($checkPwd == false) {
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                header("location: ../../html/login.php?error=wrongpassword%");
                exit();
            }
            elseif ($checkPwd == true) {
                $sql = "SELECT * FROM users WHERE username=? OR email=? AND password=?;";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $username, $username, $pwd);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 0) {
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    header("location: ../../html/login.php?error=usernotfound2");
                    exit();
                }

                else {
                    $row = $result->fetch_assoc();

                    session_start();

                    $_SESSION['userFirstName'] = $row['firstname'];
                    $_SESSION['userLastName'] = $row['lastname'];
                    $_SESSION['userUserName'] = $row['username'];
                    $_SESSION['userEmail'] = $row['email'];
                    $_SESSION['userPassword'] = $row['password'];

                    setcookie("username", $_SESSION['userUserName'],  time() + (86400 * 30), "/");
                }
            }
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        
    }
    
}
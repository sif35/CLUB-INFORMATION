<?php

class loginDataHandle {

    private $email, $password;
    public $emailErr, $passwordErr;

    public function __construct() {
        $this->email = "";
        $this->password = "";
        $this->emailErr = "";
        $this->passwordErr = "";
    }

    // public function get_email() {
    //     return $this->email;
    // }

    // public function get_password() {
    //     return $this->password;
    // }

    public function testFormInput($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    public function checkEmail() {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            if(empty($_POST['email'])) {
                $this->emailErr = "E-mail is required";
            } else {
                $this->email = $this->testFormInput($_POST['email']);
                if (!preg_match("/^[a-zA-Z0-9]([a-zA-Z0-9\.-_]+)@[a-zA-Z0-9]+.([a-z]+)(.[a-z])?$/", $this->email)) {
                    $this->email = "E-mail is invalid";
                }
            }
        }
    }

    public function checkPassword() {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            if(empty($_POST['password'])) {
                $this->passwordErr = "Password is required";
            } else {
                $this->password = $this->testFormInput($_POST['password']);
                if (!($this->password == "hello")) {
                    $this->password = "Password is invalid";
                }
            }
        }
    }

}

?>

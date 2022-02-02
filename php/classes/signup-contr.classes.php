<?php

class SignUpContr extends Signup{

    private $firstname;
    private $lastname;
    private $username;
    private $email;
    private $pwd;

    public function __construct($firstname, $lastname, $username, $email, $pwd)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->email = $email;
        $this->pwd = $pwd;
    }

    public function signupUser() {
        if ($this->emptyInput() == false) {
            header("location: ../../../../html/signup.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUid() == false) {
            header("location: location: ../../../../html/signup.php?error=username");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: location: ../../../../html/signup.php?error=email");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            header("location: location: ../../../../html/signup.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->firstname, $this->lastname, $this->username, $this->email, $this->pwd);
    }

    private function emptyInput() {

        $result = false;

        if (empty($this->firstname) || empty($this->lastname) || empty($this->username) || empty($this->email) || empty($this->pwd)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function invalidUid() {

        $result = false;

        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function invalidEmail() {

        $result = false;

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function uidTakenCheck() {

        $result = false;

        if (!$this->checkUser($this->username, $this->email)) {
            $result = false;
        } 
        else {
            $result = true;
        }

        return $result;
    }
}
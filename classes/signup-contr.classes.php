<?php

// this file is for updating database - controller in MVC model

class SignupContr {
    // protection level: make data inside classes least accessible as needed
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    // parameters are data we grabbed from user
    public function __construct($uid, $pwd, $pwdRepeat, $email) {
        // variable this pointing to properties in class and set equal to data from user
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    // error handling 
    
    // method to return true or false if input is filled out
    private function emptyInput() {
        $result;
        // conditional to check if properties inside class are empty or not. properties are assigned to data user submitted
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
            $result = false;
        }  else {
            $result = true;
        }
        return $result;

    }

    // method to check if username is valid username type, check for characters inside username with regex
    private function invalidUid() {
        $result;
        // check username against set of characters
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // method to check if email address is correct format
    private function invalidEmail() {
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // method to confirm pwd and pwdRepeat are equal
    private function pwdMatch() {
        $result;
        if($this->pwd !== $this->pwdRepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}


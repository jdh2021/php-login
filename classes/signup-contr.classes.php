<?php

// this file is for updating database

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
}


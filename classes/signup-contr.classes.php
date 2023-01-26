<?php

// this file is for updating database - controller in MVC model

class SignupContr extends Signup {
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

    // sends error message
    public function signupUser() {
        if ($this->emptyInput() == false) {
            // echo "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUid() == false) {
            // echo "Invalid username!";
            header("location: ../index.php?error=username");
            exit();
        }
        if ($this->invalidEmail() == false) {
            // echo "Invalid email!";
            header("location: ../index.php?error=email");
            exit();
        }
        if ($this->pwdMatch() == false) {
            // echo "Passwords don't match!";
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            // echo "Username or email already taken!";
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);

    }

    // error handling 
    
    // method to return true or false if input is filled out
    private function emptyInput() {
        $result;
        // conditional to check if properties inside class are empty or not. properties are assigned to data user submitted
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
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

    private function uidTakenCheck() {
        $result;
        // point to method within signup form
        if(!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}


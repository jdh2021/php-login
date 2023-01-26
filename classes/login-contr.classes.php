<?php

class LoginContr extends Login {
    // protection level: make data inside classes least accessible as needed
    private $uid;
    private $pwd;

    // parameters are data we grabbed from user
    public function __construct($uid, $pwd) {
        // variable this pointing to properties in class and set equal to data from user
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function loginUser() {
        if ($this->emptyInput() == false) {
            // echo "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        // revise method from setUser to getUser
        $this->getUser($this->uid, $this->pwd);
    }

    // error handling 
    // method to return true or false if input is filled out
    private function emptyInput() {
        $result;
        // conditional to check if properties inside class are empty or not. properties are assigned to data user submitted
        if(empty($this->uid) || empty($this->pwd)) {
            $result = false;
        }  else {
            $result = true;
        }
        return $result;
    }
}



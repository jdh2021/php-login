<?php
// extend to database class to use properties and methods, this file acts as model
class Signup extends Dbh {
    protected function setUser($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?);'); 
        // hash password before inserting it, built-in method
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $hashedPwd, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        // end statement
        $stmt=null;
    }

    // properties from inside the controller class.
    protected function checkUser($uid, $email) {
        // run prepared statement inside dbh, run sql statment and query it. referencing to connect method from within dbh 
        // $stmt points to method execute and inserts data that replaces ?
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');
        // if execution fails, this method checks if that statement fails
        // array b/c more than one piece of data being inserted
        if (!$stmt->execute(array($uid, $email))) {
            // null removes statement entirely
            $stmt = null;
            // header function takes user back to main page with error message
            header("location: ../index.php?error=stmtfailed");
            // exits script once failed
            exit();
        } 
        // create result check variable
        $resultCheck;
        // this method check if any results were returned, user was already in database
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}


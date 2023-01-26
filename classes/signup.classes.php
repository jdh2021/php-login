<?php

// extend to database class to use properties and methods
class Signup extends Dbh {
    // properties from inside the controller class.
    protected function checkUser($uid, $email) {
        // run prepared statement inside dbh, run sql statment and query it. referencing to connect method from within dbh 
        // $stmt points to method execute and inserts data that replaces ?
        $stmt = $this->connect()->prepare(
            // ? act as placeholder, prevents injection by separating database query from data that gets updated
            'SELECT users_uid FROM users WHERE users_id = ? OR users_ email = ?;');
        // if execution fails, array b/c more than one piece of data
        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            // header function takes user back to main page with error message
            header("location: ../index.php?error=stmtfailed");
            // exits script once failed
            exit();
        } 
        // create result check variable
        $resultCheck;
        // check if there are any rows that return
        if($stmt->rowCount() >0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

}


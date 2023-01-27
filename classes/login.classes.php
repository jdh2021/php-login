<?php
// extend to database class to use properties and methods, this file acts as model
class Login extends Dbh {
    protected function getUser($uid, $pwd) {
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');

        if (!$stmt->execute(array($uid, $uid))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        // if zero results from database, display error
        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        // match password to one in database, indicate how to fetch data
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // check passwords against one another using built-in method - returns true or false;
        // first pwd is one user gave us. second pwd is in multi-dimensional array
        $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);

        if($checkPwd == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        } elseif ($checkPwd == true) {
            // check for all user details where username is what user submitted or email is what user submitted
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');
            // user can submit either email or username to log in. check username OR email, AND password. 
            if (!$stmt->execute(array($uid, $uid, $pwdHashed[0]["users_pwd"]))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // check if results were returned from query, use count after results retrieved
            if(count($user) == 0) {
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            // start a session, set equal to user at index 0
            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useruid"] = $user[0]["users_uid"];

            // end statement
            $stmt=null;
        }  
    }
}


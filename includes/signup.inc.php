<?php
// don't need to include closing tag for pure PHP file

// check if submit button is set with POST superglobal
if(isset($_POST["submit"])) {
    // retrieving the data
    $uid = $_POST["uid"];
    $uid = $_POST["pwd"];
    $uid = $_POST["pwdRepeat"];
    $uid = $_POST["email"];

    // link to classes
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    // instantiating SingupContr class - create object based off class
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

    // error handlers


    // go back to front page
}
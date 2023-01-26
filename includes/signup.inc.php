<?php
// don't need to include closing tag for pure PHP file


// this file is where data gets sent after form if submitted

// check if submit button is set with POST superglobal
if(isset($_POST["submit"])) {
    // retrieving the data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];
    $email = $_POST["email"];

    // link to classes - database file needs to be first followed by signup. order is important  
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    // instantiating SingupContr class - create object based off class
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

    // error handlers
    $signup->signupUser();

    // go back to front page
    header("location: ../index.php?error=none");
}
<?php
// form we submit data to when user clicks 'Login'

// check if submit button is set with POST superglobal
if(isset($_POST["submit"])) {
    // retrieving the data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    // link to classes - database file needs to be first. order is important
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    // instantiating LoginContr class - create object based off class
    $login = new LoginContr($uid, $pwd);

    // point to method in LoginContr class that references getUser in Login class
    $login->loginUser();

     // Going to back to home page
     header("location: ../index.php?error=none");
}
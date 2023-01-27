<?php
// file for logout button functionality

// need to start a session in order to destroy a session
session_start();
// unset the session variables
session_unset();
session_destroy();

// header function to take user back to home page
header("location: ../index.php?error=none");
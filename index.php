<?php
    // need to have a session running at top of page in every page so user is able to see what they're allowed to see when logged in 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <!-- conditional rendering depending on whether user is logged in -->
                <?php
                    // checks if user is currently signed in and session is running
                    if(isset($_SESSION["userid"])) {
                ?>
                    <li><a href="#"><?php echo $_SESSION["useruid"]; ?></a></li>
                    <li><a href="includes/logout.inc.php">Log Out</a></li>
                <?php }
                    else {
                ?>
                        <li><a href="#">Sign Up</a></li>
                        <li><a href="#">Log In</a></li>
                <?php }
                ?>
            </ul>
        </nav>
</header>
    <section class="index-login">
        <div class="wrapper">
            <div class="index-login-signup">
                <h4>Sign Up</h4>
                <p>Don't have an account yet? Sign up here!</p>
                <form action="includes/signup.inc.php" method="post">
                    <input type="text" name="uid" placeholder="username">
                    <input type="password" name="pwd" placeholder="password">
                    <input type="password" name="pwdRepeat" placeholder="repeat password">
                    <input type="text" name="email" placeholder="e-mail">
                    <br>
                    <button type="submit" name="submit">Sign Up</button>
                </form>
            </div>
        <div class="index-login-login">
            <h4>Login</h4>
            <p>Don't have an account yet? Sign up here!</p>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="uid" placeholder="username">
                <input type="password" name="pwd" placeholder="password">
                <br>
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
        </div>
    </section>
</body>
</html>
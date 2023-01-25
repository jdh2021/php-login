<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="index-login">
        <div class="wrapper">
            <div class="index-login-signup">
                <h4>Sign Up</h4>
                <p>Don't have an account yet? Sign up here!</p>
                <form action="includes/signup.inc.php" method="post">
                    <input type="text" name="uid" placeholder="username">
                    <input type="password" name="pwd" placeholder="password">
                    <input type="password" name="pwdrepeat" placeholder="repeat password">
                    <input type="text" name="email" placeholder="e-mail">
                    <br>
                    <button type="submit" name="submit">Sign Up</button>
                </form>
            </div>
        <div class="index-login-login">
            <h4>Login</h4>
            <p>Don't have an account yet? Sign up here!</p>
            <form action="includes/signup.inc.php" method="post">
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
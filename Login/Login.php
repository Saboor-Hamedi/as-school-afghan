
<?php  require_once '../login_script/login_script.php'; ?>
    <?php
        if (isset($_SESSION['admin_nim'])) {
            header('location: ../Login/Login.php');
            header('location: ../logout/logout.php');
        }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="../bootstrap/bootstrap.css" />
        <link rel="stylesheet" href="../Style/style.css">
    </head>
    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="form">
        <fieldset>
            <legend>Sign In</legend>
            <label for="username" class="vhide">Username</label>
            <input id="admin_nim" name="admin_nim" type="text" placeholder="Your ID" >
            <label for="admin_pass" class="vhide">Password</label>
            <input id="admin_pass" name="admin_pass" type="password" placeholder="Your password" />
            <input type="checkbox" name="remember" id="remember" class="vhide" />
            <label for="remember"><i class="octicon octicon-check"></i> Remember all the things</label>
            <button class="signin" id="submit" name="submit">SIGN IN</button>
            <div class="alert alert-primary " role="alert">
            <h4><?php echo $user_message;?></h4>
            </div>
        </fieldset>
        </form>

    </body>

    </html>

<?php
    require_once '../load.php';
    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if(!empty($username) && !empty($password)){
            //Do login here
            $message = login($username, $password);
        }else{
            $message = 'Please fill out required fields';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/main.css">
    <title>Admin Login</title>
</head>
<body>
<header>
    <img class="headerLogo" src="../public/images/gettested_logo.svg" alt="logo">
</header>
<div id="signin">
    <h2>Sign in to your account</h2>
    <h3><?php echo !empty($message)? $message:'';?></h3>
    <form id="signinform" action="admin_login.php" method="post">
        <label class="hidden">Username</label>
        <input name="username" type="text" value="" placeholder="Username">
        <label class="hidden">Password</label>
        <input name="password" type="password" value="" placeholder="Password">
        <button name="submit" type="submit">Sign In</button>
    </form>
    <a id="gohome" href="../index.php">Go Back</a>
</div>
</body>
</html>
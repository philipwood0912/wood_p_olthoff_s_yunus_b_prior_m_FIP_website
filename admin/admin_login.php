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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="../public/css/main.css">
    <title>Admin Login</title>
</head>
<body>
<header class="login-header">
    <img class="headerLogo" src="../public/images/gettested_logo.svg" alt="logo">
</header>
<div class="signin-body">
<div id="signin">
    <a id="gohome" href="../index.php"><button><i class="fas fa-arrow-circle-left fa-1x"></i> Go Back</button></a>
    <h2><?php echo !empty($message)? $message:'Sign in to your account';?></h2>
    <form id="signinform" action="admin_login.php" method="post">
        <label class="hidden">Username</label>
        <input name="username" type="text" value="" placeholder="Username">
        <label class="hidden">Password</label>
        <input name="password" type="password" value="" placeholder="Password">
        <button name="submit" type="submit">Sign In <i class="fas fa-arrow-circle-right"></i></button>
    </form>
</div>
</div>
</body>
</html>
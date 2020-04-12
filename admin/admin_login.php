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
    <a class="headerLogo" href="../#"><img src="../public/images/gettested_logo.svg" alt="logo"></a>
</header>
<div class="signin-body">
    

<div class="signin">
    <div class="blueBorder">

        <button class="backwardBtn homeBtn" id="homeBtn"><i class="fas fa-home"></i> Home</button>

        <button class="forwardBtn"><i class="fas fa-arrow-circle-left"></i> Go Back</button>

    <h2 class="dash-head"><?php echo !empty($message)? $message:'Sign In to Your Account';?></h2>
    <form id="signinform" action="admin_login.php" method="post">
        <div class="labelWrapLogin">
            <label class="inputLabel">Username:</label>
            <input name="username" type="text" value="" placeholder="Username" >
        </div>
        <div class="labelWrapLogin">
            <label class="inputLabel">Password:</label>
            <input name="password" type="password" value="" placeholder="Password">
        </div>

        
    
        <button class="forwardBtn" id="signinBtn" name="submit" type="submit">Sign In<i class="fas fa-arrow-circle-right"></i></button>
        
    </form>
    </div>
</div>

</div>
</body>
</html>
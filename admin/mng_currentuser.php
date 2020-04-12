<?php

    require_once '../load.php';
    confirm_logged_in();
    $id = $_SESSION['user_id'];
    $current_user = getSingleUser($id);
    if(!$current_user){
        $message = "Failed to get info";
    }
    if(isset($_POST['submit'])){
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $message = editUser($id, $fname, $lname, $email, $username);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="../public/css/main.css">
    <title>Edit User</title>
</head>
<body>
<header>
        <a class="headerLogo" href="dashboard.php"><img src="../public/images/gettested_logo.svg" alt="logo"></a>
    </header>
    <div class="sub-dash-wrap">
    <div class="sub-dashboard">
        <div class="sub-dash-title current-user"><h2><?php echo !empty($message)? $message:'Edit Current User';?></h2><a href="dashboard.php"><button><i class="fas fa-arrow-circle-left"></i> Go Back</button></a></div>
        
        <form class="dashboard-form" action="mng_currentuser.php" method="post">
        <?php if($current_user):?>
            <?php while($user_info = $current_user->fetch(PDO::FETCH_ASSOC)):?>
            <label>First Name</label>
            <input type="text" name="fname" value="<?php echo $user_info['F_Name'];?>">
            <label>Last Name</label>
            <input type="text" name="lname" value="<?php echo $user_info['L_Name'];?>">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $user_info['Email'];?>">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $user_info['User_Name'];?>">
            <button name="submit">Edit Account</button>
            <?php endwhile;?>
        <?php endif;?>
        </form>
    </div>
    </div>
</body>
</html>
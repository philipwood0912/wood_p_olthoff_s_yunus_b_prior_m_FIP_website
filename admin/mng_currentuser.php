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
    if(isset($_POST['passreset'])){
        $id = $_SESSION['user_id'];
        $oldpass = trim($_POST['oldpass']);
        $newpass = trim($_POST['newpass']);
        if(empty($oldpass) || empty($newpass)){
            $message_pass = "Please fill out required fields";
        } else {
            $message_pass = passwordReset($id, $oldpass, $newpass);
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
    <title>Edit User</title>
</head>
<body>
<header>
    <a class="headerLogo" href="dashboard.php"><img src="../public/images/gettested_logo.svg" alt="logo"></a>
</header>
<div class="signin-body">
    <div class="signin">
        <div class="blueBorder">
            <div href="../#">
                <button class="backwardBtn" id="homeBtn3"><i class="fas fa-home"></i> Home</button>
            </div>
            
            <div class="dashboardContent">
                    <h2 class="dash-head"><?php echo !empty($message)? $message:'Edit Current User';?></h2></div>
                    <form action="mng_currentuser.php" method="post" class="user-form">
                    <?php if($current_user):?>

                    <?php while($user_info = $current_user->fetch(PDO::FETCH_ASSOC)):?>
                        <label class="inputLabel">First Name:</label>
                        <input type="text" name="fname" value="<?php echo $user_info['F_Name'];?>">
                        <label class="inputLabel">Last Name:</label>
                        <input type="text" name="lname" value="<?php echo $user_info['L_Name'];?>">
                        <label class="inputLabel">Email:</label>
                        <input type="text" name="email" value="<?php echo $user_info['Email'];?>">
                        <label class="inputLabel">Username:</label>
                        <input type="text" name="username" value="<?php echo $user_info['User_Name'];?>">
                  
                    <button class="forwardBtn" name="submit" id="editBtn">Edit Account</button>
                    <?php endwhile;?>
                    <?php endif;?>
                    </form>

                    <h3 class="dash-head"><?php echo !empty($message_pass)? $message_pass:'Reset Password';?></h3>

                <form action="mng_currentuser.php" method="post">
                <?php if($current_user):?>
                        <div class="passCon">
                            <label class="inputLabel">Old Password:</label>
                            <input type="text" name="oldpass" value="">
                    

                            <label class="inputLabel">New Password:</label>
                            <input type="text" name="newpass" value="">
                        </div>  

                        <button class="backwardBtn" id="backBtn"><i class="fas fa-arrow-circle-left fa-1x"></i> Go Back</button>
                    
                        <button class="forwardBtn" name="submit" id="passreset">Reset Password</button>
                        
                        
                <?php endif;?>
                </form><br>
            </div>
        </div>
    </div>
</div>
</body>
</html>
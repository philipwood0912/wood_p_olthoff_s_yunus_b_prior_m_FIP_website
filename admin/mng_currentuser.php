<?php

    require_once '../load.php';
    confirm_logged_in();
    $id = $_SESSION['user_id'];
    $current_user = getSingleUser($id);
    if(!$current_user){
        $message = "Failed to get info";
    }
    // this one is pretty straight forward..
    if(isset($_POST['submit'])){
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $message = editUser($id, $fname, $lname, $email, $username);
    }
    if(isset($_POST['passreset'])){
        // if passreset is set, get id from session and run function if fields are not empty
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
            <div>
                <form action="logout.php" method="get"><button class="backwardBtn" id="homeBtn3"><i class="fas fa-home"></i> Home</button></form>
            </div>
            
            <div class="dashboardContent">
                    <h2 class="dash-head"><?php echo !empty($message)? $message:'Edit Current User';?></h2></div>
                    <form action="mng_currentuser.php" method="post" class="user-form">
                    <?php if($current_user):?>

                    <?php while($user_info = $current_user->fetch(PDO::FETCH_ASSOC)):?>
                        <label class="inputLabel shift">First Name:</label>
                        <input type="text" name="fname" value="<?php echo $user_info['F_Name'];?>">
                        <label class="inputLabel shift">Last Name:</label>
                        <input type="text" name="lname" value="<?php echo $user_info['L_Name'];?>">
                        <label class="inputLabel shift">Email:</label>
                        <input type="text" name="email" value="<?php echo $user_info['Email'];?>">
                        <label class="inputLabel shift">Username:</label>
                        <input type="text" name="username" value="<?php echo $user_info['User_Name'];?>">
                  
                    <button class="forwardBtn" name="submit" id="editBtn">Edit Account</button>
                    <?php endwhile;?>
                    <?php endif;?>
                    </form>

                    <h3 class="dash-head"><?php echo !empty($message_pass)? $message_pass:'Reset Password';?></h3>

                <form action="mng_currentuser.php" method="post">
                <?php if($current_user):?>
                        <div class="passCon">
                            <label class="inputLabel shift">Old Password:</label>
                            <input type="text" name="oldpass" value="">
                    

                            <label class="inputLabel shift">New Password:</label>
                            <input type="text" name="newpass" value="">
                        </div>  

                        <a href="dashboard.php" class="backwardBtn" id="backBtn"><i class="fas fa-arrow-circle-left fa-1x"></i> Go Back</a>
                    
                        <button class="forwardBtn" name="passreset" id="passreset">Reset Password</button>
                        
                        
                <?php endif;?>
                </form><br>
            </div>
        </div>
    </div>
</div>
</body>
</html>
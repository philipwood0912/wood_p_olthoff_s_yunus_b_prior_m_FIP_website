<?php
    require_once '../load.php';
    confirm_logged_in();
    if(isset($_POST['submit'])){
        $oldpassword = trim($_POST['oldpass']);
        $password = trim($_POST['newpass']);
        $conpassword = trim($_POST['connewpass']);

        if(empty($oldpassword) || empty($password) || empty($conpassword)){
            $message = "Please fill out required fields";
        } else {
            if($password === $conpassword){
                $message = changePass($oldpassword, $password);
            } else {
                $message = "New passwords must match";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/main.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <header>
        <img src="../public/images/fip_logo.svg" alt="logo">
    </header>
    <div class="sub-dashboard">
        <h3>Change your password</h3>
        <h3><?php echo !empty($message)? $message:'';?></h3>
        <form class="dashboard-form" action="chg_pass.php" method="post">
            <label class="hidden">Old Password</label>
            <input name="oldpass" type="text" value="" placeholder="Old Password">
            <label class="hidden">New Password</label>
            <input name="newpass" type="text" value="" placeholder="New Password">
            <label class="hidden">Confirm New Password</label>
            <input name="connewpass" type="text" value="" placeholder="Confirm New Password">
            <button name="submit">Submit</button>
        </form>
        <a href="dashboard.php">Go Back</a>
    </div>
</body>
</html>
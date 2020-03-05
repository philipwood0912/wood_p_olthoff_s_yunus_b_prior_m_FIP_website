<?php
    require_once '../load.php';
    confirm_logged_in();
    if(isset($_POST['submit'])){
        $oldusername = trim($_POST['olduser']);
        $username = trim($_POST['newuser']);
        $conusername = trim($_POST['connewuser']);

        if(empty($oldusername) || empty($username) || empty($conusername)){
            $message = "Please fill out required fields";
        } else {
            if($username === $conusername){
                $message = changeUser($oldusername, $username);
            } else {
                $message = "New Usernames must match";
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
        <h3>Change your username</h3>
        <h3><?php echo !empty($message)? $message:'';?></h3>
        <form class="dashboard-form" action="chg_user.php" method="post">
            <label class="hidden">Old Username</label>
            <input name="olduser" type="text" value="" placeholder="Old Username">
            <label class="hidden">New Username</label>
            <input name="newuser" type="text" value="" placeholder="New Username">
            <label class="hidden">Confirm New Username</label>
            <input name="connewuser" type="text" value="" placeholder="Confirm New Username">
            <button name="submit">Submit</button>
        </form>
        <a href="dashboard.php">Go Back</a>
    </div>
</body>
</html>
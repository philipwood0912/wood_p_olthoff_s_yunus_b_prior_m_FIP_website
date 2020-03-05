<?php
    require_once '../load.php';
    confirm_logged_in();
    if(isset($_POST['submit'])){
        $oldemail = trim($_POST['oldemail']);
        $email = trim($_POST['newemail']);
        $conemail = trim($_POST['connewemail']);

        if(empty($oldemail) || empty($email) || empty($conemail)){
            $message = "Please fill out required fields";
        } else {
            if($email === $conemail){
                $message = changeEmail($oldemail, $email);
            } else {
                $message = "New emails must match";
            }
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
    <title>Admin Dashboard</title>
</head>
<body>
    <header>
        <img src="../public/images/fip_logo.svg" alt="logo">
    </header>
    <div class="sub-dashboard">
        <h2>Change your email</h2>
        <h3><?php echo !empty($message)? $message:'';?></h3>
        <form class="dashboard-form" action="chg_email.php" method="post">
            <label class="hidden">Old Email</label>
            <input name="oldemail" type="text" value="" placeholder="Old Email">
            <label class="hidden">New Email</label>
            <input name="newemail" type="text" value="" placeholder="New Email">
            <label class="hidden">Confirm New Email</label>
            <input name="connewemail" type="text" value="" placeholder="Confirm New Email">
            <button name="submit">Submit</button>
        </form>
        <a href="dashboard.php">Go Back <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</body>
</html>
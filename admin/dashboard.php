<?php
    require_once '../load.php';
    confirm_logged_in();
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
    <div class="dashboard">
        <h2>Welcome back <?php echo $_SESSION['username'];?></h2>
        <h3>Admin Settings</h3>
        <ul id="mainNav">
            <a href="chg_pass.php">Change Password <i class="fas fa-arrow-circle-right"></i></a>
            <a href="chg_user.php">Change Username <i class="fas fa-arrow-circle-right"></i></a>
            <a href="chg_email.php">Change Email <i class="fas fa-arrow-circle-right"></i></a>
            <a href="mng_users.php">Manage Users <i class="fas fa-arrow-circle-right"></i></a>
            <a href="mng_content.php">Manage Content <i class="fas fa-arrow-circle-right"></i></a>
            <a href="logout.php">Log Out <i class="fas fa-arrow-circle-right"></i></a>
        </ul>
    </div>
</body>
</html>
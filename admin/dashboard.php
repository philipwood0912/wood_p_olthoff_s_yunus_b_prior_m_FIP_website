<?php
    if(!isset($_SESSION)){
        session_start();
    }
    require_once '../load.php';
    $username = $_SESSION['user'];
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
    <div class="dashboard">
        <h2>Welcome back <?php echo $username;?></h2>
        <h3>Admin Settings</h3>
        <ul>
            <a>Change Password</a>
            <a>Change Username</a>
            <a>Change Email</a>
            <a>Manage Users</a>
            <a>Manage Content</a>
            <button>Log Out</button>
        </ul>
    </div>
</body>
</html>
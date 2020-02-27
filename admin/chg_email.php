<?php
    require_once '../load.php';
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
        <h3>Change your email</h3>
        <form class="dashboard-form" action="chg_email.php" method="post">
            <label class="hidden">Old Email</label>
            <input name="oldemail" type="text" value="" placeholder="Old Email">
            <label class="hidden">New Email</label>
            <input name="newemail" type="text" value="" placeholder="New Email">
            <label class="hidden">Confirm New Email</label>
            <input name="connewemail" type="text" value="" placeholder="Confirm New Email">
            <button name="submit">Submit</button>
        </form>
        <a href="dashboard.php">Go Back</a>
    </div>
</body>
</html>
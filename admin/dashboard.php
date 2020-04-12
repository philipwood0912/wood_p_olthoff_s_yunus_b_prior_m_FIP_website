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
    <header class="dash-header">
        <a class="headerLogo" href="logout.php"><img src="../public/images/gettested_logo.svg" alt="logo"></a>
    </header>
    <div class="signin-body">
        <div class="signin">
            <div class="blueBorder">
                <a href="../#"><button class="backwardBtn" id="homeBtn2"><i class="fas fa-home"></i> Home</button></a>
                <div class="dashboardContent">
                <h2 class="dash-head">Welcome To The Site CMS <?php echo $_SESSION['name'];?></h2>
                <h2 class="popUpSmall">What would you like to change?</h2>

                <form action="mng_currentuser.php" method="get"><button class="forwardBtn">Manage Current User <i class="fas fa-arrow-circle-right"></i></button></form><br>

                    <form action="mng_users.php" method="get"><button class="forwardBtn">Manage All Users <i class="fas fa-arrow-circle-right"></i></button></form><br>

                    <form action="mng_content.php" method="get"><button class="forwardBtn">Manage Content <i class="fas fa-arrow-circle-right"></i></button></form><br>
                    
                    <form action="logout.php" method="get"><button class="forwardBtn">Log Out <i class="fas fa-arrow-circle-right"></i></button></form><br>
                
                <div>
            <div>
        </div>
    </div>
</body>
</html>
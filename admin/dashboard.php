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
<<<<<<< HEAD
    <div class="signin-body">
        <div class="signin">
            <div class="blueBorder"><a href="../#"><button class="backwardBtn homeBtn"><i class="fas fa-home"></i> Home</button></a>
=======
    <div class="dashboard-con">
        <div class="dashboardIconCon">
            <form action="logout.php" method="get" class="dashboardIconPad"><button class="buttonMain"><i class="fas fa-home"></i> Home</button></form>
        </div>
        <div class="dashboard">
            <div class="blueBorder">
>>>>>>> dfe8ccab25dcf5e7ad8cebef23db44fa3fd57be3
                <div class="dashboardContent">
                <h2 class="dash-head">Welcome To The Site CMS <?php echo $_SESSION['name'];?></h2>
                <h2 class="popUpSmall">What would you like to change?</h2>
                <ul id="mainNav">
<<<<<<< HEAD
                    <a href="mng_currentuser.php"><button class="forwardBtn">Manage Current User <i class="fas fa-arrow-circle-right"></i></button></a>
                    <a href="mng_users.php"><button class="forwardBtn">Manage All Users <i class="fas fa-arrow-circle-right"></i></button></a>
                    <a href="mng_content.php"><button class="forwardBtn">Manage Content <i class="fas fa-arrow-circle-right"></i></button></a>
                    <a href="logout.php"><button class="forwardBtn">Log Out <i class="fas fa-arrow-circle-right"></i></button></a>
=======
                    <form action="mng_currentuser.php" method="get"><button class="buttonMain">Manage Current User <i class="fas fa-arrow-circle-right"></i></button></form>
                    <form action="mng_users.php" method="get"><button class="buttonMain">Manage All Users <i class="fas fa-arrow-circle-right"></i></button></form>
                    <form action="mng_content.php" method="get"><button class="buttonMain">Manage Content <i class="fas fa-arrow-circle-right"></i></button></form>
                    <form action="logout.php" method="get"><button class="buttonMain">Log Out <i class="fas fa-arrow-circle-right"></i></button></form>
>>>>>>> dfe8ccab25dcf5e7ad8cebef23db44fa3fd57be3
                </ul>
                <div>
            <div>
        </div>
    </div>
</body>
</html>
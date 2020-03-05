<?php
    require_once '../load.php';
    confirm_logged_in();
    if(isset($_POST['create'])){
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $email = trim($_POST['email']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if(empty($fname) || empty($lname) || empty($email) || empty($username) || empty($password)){
            $message_create = "Please fill out the required fields";
        } else {
            $message_create = createUser($fname, $lname, $email, $username, $password);
        }
    }
    if(isset($_POST['search'])){
        $username = trim($_POST['username']);
        if(empty($username)){
            $message_search = "Please fill out the required fields";
        } else {
            $user_search = searchUser($username);
            if($user_search === null){
                $message_search = "User does not exist!";
            }
        }
    }
    if(isset($_POST['delete'])){
        $username = trim($_POST['username']);
        if(empty($username)){
            $message_delete = "Please fill out the required fields";
        } else {
            $message_delete = deleteUser($username);
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
        <h2>Manage Users</h2>
        <form action="mng_users.php" method="post">
            <h3>Create New User</h3>
            <h3><?php echo !empty($message_create)? $message_create:'';?></h3>
            <label class="hidden">First Name</label>
            <input name="fname" type="text" value="" placeholder="First Name">
            <label class="hidden">Last Name</label>
            <input name="lname" type="text" value="" placeholder="Last Name">
            <label class="hidden">Email</label>
            <input name="email" type="email" value="" placeholder="Email">
            <label class="hidden">Username</label>
            <input name="username" type="text" value="" placeholder="Username">
            <label class="hidden">Password</label>
            <input name="password" type="text" value="" placeholder="Password">
            <button name="create">Create User</button>
        </form>
        <form action="mng_users.php" method="post">
            <h3>Search for User</h3>
            <h3><?php echo !empty($message_search)? $message_search:'';?></h3>
            <label class="hidden">Username</label>
            <input name="username" type="text" value="" placeholder="Username">
            <button name="search">Search User</button>
            <h3>First Name: <?php if(isset($user_search)){echo $user_search[0]['F_Name'];}?></h3>
            <h3>Last Name: <?php if(isset($user_search)){echo $user_search[0]['L_Name'];}?></h3>
            <h3>Email: <?php if(isset($user_search)){echo $user_search[0]['Email'];}?></h3>
            <h3>Username: <?php if(isset($user_search)){echo $user_search[0]['User_Name'];}?></h3>
            <h3>Password: <?php if(isset($user_search)){echo $user_search[0]['User_Pass'];}?></h3>
        </form>
        <form action="mng_users.php" method="post">
            <h3>Delete User</h3>
            <h3><?php echo !empty($message_delete)? $message_delete:'';?></h3>
            <label class="hidden">Username</label>
            <input name="username" type="text" value="" placeholder="Username">
            <button name="delete">Delete User</button>
        </form>
        <a href="dashboard.php">Go Back <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</body>
</html>
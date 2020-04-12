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
$users = getAllUsers();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    //$id = 1000;
    $message = deleteUser($id);
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
    <a class="headerLogo" href="dashboard.php"><img src="../public/images/gettested_logo.svg" alt="logo"></a>
</header>
<div class="sub-dash-wrap">
    <div class="dashboardSubIconCon">
        <form action="logout.php" method="get" class="dashboardSubIconPad"><button class="buttonMain"><i class="fas fa-home"></i> Home</button></form>
    </div>
    <div class="sub-dashboard">
        <div class="blueBorder">
            <div class="dashboardSubContent">
                <div class="sub-dash-title"><h2>Manage Users</h2></div>
                <form class="dashboard-form" action="mng_users.php" method="post">
                    <h3><?php echo !empty($message_create)? $message_create:'Create New User';?></h3>
                    <div class="labelWrapDashboard">
                        <label>First Name:</label>
                        <input name="fname" type="text" value="" placeholder="First Name">
                    </div>
                    <div class="labelWrapDashboard">
                        <label>Last Name:</label>
                        <input name="lname" type="text" value="" placeholder="Last Name">
                    </div>
                    <div class="labelWrapDashboard">
                        <label>Email:</label>
                        <input name="email" type="email" value="" placeholder="Email">
                    </div>
                    <div class="labelWrapDashboard">
                        <label>Username:</label>
                        <input name="username" type="text" value="" placeholder="Username">
                    </div>
                    <div class="labelWrapDashboard">
                        <label>Password:</label>
                        <input name="password" type="text" value="" placeholder="Password">
                    </div>
                    <div class="buttonWrapSubDash">
                        <div class="forwardBtn"><a href="dashboard.php"><i class="fas fa-arrow-circle-left"></i> Go Back</a></div>
                        <button class="buttonMain" name="create">Create User</button>
                    </div>
                </form>
                <div class="table-form">
                    <table>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Delete</th>
                        </tr>
                        <tbody>
                            <?php while($founduser = $users->fetch(PDO::FETCH_ASSOC)):?>
                                <tr>
                                    <td><?php echo $founduser['F_Name'];?></td>
                                    <td><?php echo $founduser['L_Name'];?></td>
                                    <td><?php echo $founduser['User_Name'];?></td>
                                    <td><?php if($_SESSION['user_id'] === $founduser['ID']){continue;}?><a href="mng_users.php?id=<?php echo $founduser['ID'];?>"><i class="fas fa-times-circle fa-2x"></i></a></td>
                                <tr>
                            <?php endwhile;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
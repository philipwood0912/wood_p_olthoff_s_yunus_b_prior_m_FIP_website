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
<div class="signin-body">
    <div class="signin">
        <div class="blueBorder">
        
            <a href="../#"><button class="backwardBtn homeBtn" id="homeBtn4"><i class="fas fa-home"></i> Home</button></a>
            
            <div class="dashboardContent">
                <div class="dash-head"><h2>Manage Users</h2>
                </div>
                <form action="mng_users.php" method="post" class="user-form">
                    <h3 class="dash-head"><?php echo !empty($message_create)? $message_create:'Create New User';?></h3>
                        <label class="inputLabel">First Name:</label>
                        <input name="fname" type="text" value="" placeholder="First Name">
                        <label class="inputLabel">Last Name:</label>
                        <input name="lname" type="text" value="" placeholder="Last Name">
                        <label class="inputLabel">Email:</label>
                        <input name="email" type="email" value="" placeholder="Email">
                        <label class="inputLabel">Username:</label>
                        <input name="username" type="text" value="" placeholder="Username">
                        <label class="inputLabel">Password:</label>
                        <input name="password" type="text" value="" placeholder="Password">
                        <hr>

                        <button class="forwardBtn" name="create">Create User</button>
                        <hr>
                        
                        <button class="backwardBtn"><i class="fas fa-arrow-circle-left"></i> Go Back</button>
                    </div>
                </form>
                <div class="table-form">
                    <h2 class="dash-head"> User List</h2>
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
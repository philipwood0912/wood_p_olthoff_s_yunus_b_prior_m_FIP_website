<?php
    require_once 'load.php';
    if(isset($_POST['login'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if(!empty($username) && !empty($password)){
            //Do login here
            $message = login($username, $password);
        }else{
            $message = 'Please fill out required fields';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/main.css">
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
    <title>FIP</title>
</head>
<body>
    <main id="app">
    <?php include 'templates/header.php'; ?>
<router-view></router-view>
    <?php include 'templates/footer.php'; ?>
    </main>
    <script defer src="public/js/main.js" type="module"></script>
</body>
</html>
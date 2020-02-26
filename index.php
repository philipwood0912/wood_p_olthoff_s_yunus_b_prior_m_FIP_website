<?php
    require_once 'load.php';
    if(isset($_POST['submit'])){
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="public/css/main.css">
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
    <title>FIP</title>
</head>

<body>
<<<<<<< HEAD
    <main id="app">
    <header>
        <img src="" alt="logo">
        <div class="menu" :class="{'active': isActive}" @click="showTopMenu = !showTopMenu, isActive = !isActive"><i class="fas fa-bars fa-3x"></i></div>
    </header>
    <div id="menu-overlay" v-if="showTopMenu">
        <router-link to="/">Home</router-link>
        <router-link to="/learn">Learn More</router-link>
        <router-link to="/about">About Us</router-link>
        <router-link to="/contact">Contact</router-link>
        <router-link to="/login">Admin Login</router-link>
    </div>
    <div v-else></div>
    <router-view></router-view>
    </main>
    <script src="public/js/main.js" type="module"></script>
=======
<main id="app">
<?php include 'templates/header.php'; ?>

    <router-view></router-view>

    <?php include 'templates/footer.php'; ?>
</main>
<script src="public/js/main.js" type="module"></script>
>>>>>>> 0928bb4c64a75697a94ae751cf16889bdb539b32
</body>
</html>
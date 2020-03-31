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
    <script src="public/js/libraries/vue-google-maps.js"></script>
    <title>FIP</title>
</head>

<body>
<main id="app">
    <?php include 'templates/header.php'; ?>

    <router-view></router-view>

    <?php include 'templates/footer.php'; ?>
</main>
<script src="config/config.js"></script>
<script src="public/js/main.js" type="module"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugerencias La Salle Online</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="src/Bootstrap/css/bootstrap.min.css">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/a3c7d26cee.js" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-dark bg-dark sticky-top">
    <div class="container">
        <a href="index.php" class="navbar-brand">Sugerencias La Salle Online</a>
        <?php 
        if(isset($_SESSION['user_id'])) {
            ?>
                <a href="profile.php" class="navbar-brand"><?=$_SESSION['username']?></a>
            <?php
        } else {
            ?>
                <a href="login.php" class="navbar-brand">Login</a>
            <?php
        }
        ?>
        
    </div>
</nav>

<?php
    if (isset($_GET['session'])) {
        $session = $_GET['session'];
        if ($session = 'close') {
            echo $session;
            session_destroy();

            header("Location: http://localhost/index.php");
        }
    }
?>
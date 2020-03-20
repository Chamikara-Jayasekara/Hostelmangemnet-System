<?php
require_once 'assets/php/session.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?= ucfirst(basename($_SERVER['PHP_SELF'], '.php.')); ?> </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/navstyle.css">
    <link rel="stylesheet" href="css/semantic.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Maven+Pro:400,500,600,700,800,900&display=swap');
        *{
            font-family: 'Maven Pro', sans-serif ;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <a class="navbar-brand" href="home.php"><img src="assets/img/uop.png" alt="" style="width:300px;"></a>
    <a id="resp-menu" class="responsive-menu" href="#"><i class="fa fa-home"></i> Menu</a>

    <ul class="menu ml-auto">
        <li class="nav-item"><a class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "home.php")? "active":""; ?> href="home.php" > <i class="fa fa-home"></i> Home</a></li>
        <li class="nav-item"><a  class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "profile.php")? "active":""; ?> href="profile.php"><i class="fa fa-user-circle"></i>Profile</a></li>
        <li class="nav-item"><a class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "feedback.php")? "active":""; ?> href="feedback.php"><i class="fa fa-comment-dots"></i>Feedback</a></li>
        <li class="nav-item"><a class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "notification.php")? "active":""; ?> href="notification.php"><i class="fas fa-bell"></i>Notification</a></li>
        <li class="nav-item"><a class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "settings.php")? "active":""; ?> href="settings.php"><i class="fas fa-users-cog"></i>Settings</a></li>
        <li class="nav-item"><a class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "logout.php")? "active":""; ?> href="assets/php/logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
    </ul>
</nav>

</body>
</html>

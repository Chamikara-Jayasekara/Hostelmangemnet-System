
<?php
require_once 'assets/php/header2.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hostel Management system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/semantic.min.css">
    <link rel="stylesheet" href="assets/css/navstyle.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4 bg-light mt-lg-4">
        <div class="p-5 mt-2 mb-2" style="border: 2px solid #0c5460">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Login Here</h1>
                <?php
                if (isset($_SESSION['status']) && $_SESSION['status'] != ''){
                    echo '<h2>'.$_SESSION['status'].'</h2>';
                    unset($_SESSION['status']);
                }
                ?>
            </div>
            <form action="code.php" method="post" class="user">
            <div class="form-group ">
                <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail">
            </div>
            <div class="form-group">
                <input type="Password" name="password" class="form-control form-control-user" id="exampleInputPassword">
            </div>
                <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

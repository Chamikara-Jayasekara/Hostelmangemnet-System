<?php
    require_once  'assets/php/auth.php';
    $user = new auth();

    $msg ='';

    if (isset($_GET['email']) && isset($_GET['token'])){
        $email = $user->test_input($_GET['email']);
        $token = $user->test_input($_GET['token']);

        $auth_user = $user->reset_pass_auth($email,$token);

        if ($auth_user != null) {
            if (isset($_POST['submit'])) {
                $newpass = $_POST['pass'];
                $cnewpass = $_POST['cpass'];

                $hnewpass = password_hash($newpass, PASSWORD_DEFAULT);

                if ($newpass == $cnewpass) {
                    $user->update_new_pass($hnewpass, $email);
                    $msg = 'Password Changed Successfully!<br><a href="index.php">Login Here!</a>';
                } else {
                    $msg = 'Password not matched';
                }
            }
        }
        else{
             header('location:index.php');
             exit();
        }
    }
    else{
        header('location:index.php');
        exit();
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Management system-Reset Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <!--Login Form begun-->
    <div class="row justify-content-center wrapper">
        <div class="col-lg-10 my-auto">
            <div class="card-group myShadow">
                <div class="card justify-content-center rounded-left myColor p-4">
                    <h1 class="text-center font-weight-bold text-white">Reset Your password Here!</h1>
                </div>
                <div class="card rounded-right p-4 leftCard" style="flex-grow:2;">
                    <h1 class="text-center font-weight-bold text-light">Enter New Password</h1>
                    <hr class=" my-3" style="background-color: whitesmoke">
                    <form action="" method="post" class="px-3" >
                        <div class="alert alert-secondary lead my-2" role="alert">
                            <?= $msg; ?>
                        </div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span>
                            </div>
                            <input type="password" name="pass"  class="form-control rounded-0" placeholder="Password"
                                   required minlength="5" ">
                        </div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span>
                            </div>
                            <input type="password" name="cpass"  class="form-control rounded-0" placeholder="confirm new Password"
                                   required minlength="5" ">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Reset Password" name="submit" class="btn btn-primary btn-lg btn-block myBtn">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
</body>
</html>

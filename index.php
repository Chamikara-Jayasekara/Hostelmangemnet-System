<?php
session_start();
if (isset($_SESSION['user'])){
    header('location:home.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Management system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!--Login Form begun-->
    <div class="row justify-content-center wrapper" id="login-box" style="height: 85vh">
        <div class="col-lg-10 my-auto">
            <div class="card-group myShadow ">
                <div class="card rounded-left p-4 leftCard bg-light" style="flex-grow: 1.4;">
                    <h1 class="text-center font-weight-bold text-black">Sign in to account</h1>
                    <hr class=" my-3 bg-info" style="background-color: whitesmoke">
                    <form action="" method="post" class="px-3" id="login-form">
                        <div id="loginAlert"></div>
                        <div class="input-group input-group-sm form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-envelope fa-lg"></i>
                                </span>
                            </div>
                            <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="E-mail"  required value="
<?php   if (isset($_COOKIE['email'])){echo $_COOKIE['email'];}?>" ">
                        </div>
                        <div class="input-group input-group-sm  form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Password"
                                   required value="<?php   if (isset($_COOKIE['email'])){echo $_COOKIE['email'];}?>">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox float-left">
                                <input type="checkbox" name="rem" class="custom-control-input" id="customCheck"
                                 <?php if (isset($_COOKIE['email'])) {?> checked <?php } ?>>
                                <label for="customCheck" class="custom-control-label text-black-50">Remember Me</label>
                            </div>
                            <div class="forgot float-right">
                                <button type="button" id="forgot-link" class="btn btn-success text-white">Forgot password</button>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Sign in" id="login-btn" class="btn btn-primary btn-lg btn-block myBtn">
                            <a href="home.php">Login</a>
                        </div>
                    </form>
                </div>
                <div class="card justify-content-center rounded-right myColor p-4">
                    <img src="assets/img/uop.png" alt=""  class="mt-4" style="text-align: center;width: 500px; margin-left: -62px;">
                <h5 class="text-center font-weight-bold text-white">Welcome to hostel management system, University of Peradeniya</h5>
                <hr class="my-3 bg-light myHr">
                <p class="text-center  text-light lead">Enter your personal details and create your account to enjoy your residential facilities.This is
                the general way to connect with residentail facilities</p>
                <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" style="hower:" id="register-link">Sign Up</button>
                    <button class="btn btn-outline-success btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" style="hower:" id="admin-login-button">Admin Login</button>
                </div>
            </div>
        </div>
    </div>

    <!--Login form end-->
    <!--Register form Start-->
    <div class="row justify-content-center wrapper" id="register-box" style="display: none;height: 85vh">
        <div class="col-lg-10 my-auto">
            <div class="card-group myShadow">
                <div class="card justify-content-center rounded-left myColor p-4">

                    <img src="assets/img/uop.png" alt=""  class="mt-4" style="text-align: center;width: 500px; margin-left: -62px;">
                    <h5 class="text-center font-weight-bold text-white">Welcome back!</h5>
                    <hr class="my-3 bg-light myHr">
                    <p class="text-center font-weight-bolder text-light lead">To connected  with us! login with your details</p>
                    <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="login-link">Sign In</button>
                </div>
                <div class="card rounded-right p-4 leftCard bg-light" style="flex-grow: 1.4;">
                    <h1 class="text-center font-weight-bold text-dark">Create account</h1>
                    <hr class=" my-3" style="background-color: whitesmoke">
                    <form action="" method="post" class="px-2" id="register-form">
                        <div id="regAlert"></div>
                        <div class="input-group input-group-sm form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-user fa-lg"></i>
                                </span>
                            </div>
                            <input type="text" name="name" id="name" class="form-control rounded-0" placeholder="Full Name" required>
                        </div>
                        <div class="input-group input-group-sm form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-envelope fa-lg"></i>
                                </span>
                            </div>
                            <input type="email" name="email" id="remail" class="form-control rounded-0" placeholder="E-mail" required>
                        </div>
                        <div class="input-group input-group-sm form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span>
                            </div>
                            <input type="password" name="password" id="rpassword" class="form-control rounded-0" placeholder="Password" required minlength="5">
                        </div>
                        <div class="input-group input-group-sm form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span>
                            </div>
                            <input type="password" name="cpassword" id="crpassword" class="form-control rounded-0" placeholder="Confirm Password" required minlength="5">
                        </div>
                        <div class="form-group">
                            <div id="passError" class="text-light font-weight-bold">

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox float-left">
                                <input type="checkbox" name="rem" class="custom-control-input" id="customCheck">
                                <label for="customCheck" class="custom-control-label text-dark">Remember Me</label>
                            </div>
                            <div class="forgot float-right">
                                <a href="" id="forgot-link" class="text-dark">Forgot Password</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Sign up" id="register-btn" class="btn btn-primary btn-lg btn-block myBtn">
                            <a href="home.php">Login</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
<!--    Register form end-->
<!--    forgot password form start-->
    <div class="row justify-content-center wrapper" id="forgot-box" style="display: none;height: 85vh">
        <div class="col-lg-10 my-auto">
            <div class="card-group myShadow">
                <div class="card justify-content-center rounded-left myColor p-4">
                    <img src="assets/img/uop.png" alt=""  class="mt-4" style="text-align: center;width: 500px; margin-left: -62px;">
                    <h5 class="text-center font-weight-bold text-white">Reset Password</h5>
                    <hr class="my-3 bg-light myHr">
                    <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="back-link">Back</button>
                </div>
                <div class="card rounded-right p-4 leftCard bg-light" style="flex-grow: 1.4;">
                    <h1 class="text-center font-weight-bold text-dark">Forgot your Password</h1>
                    <hr class=" my-3" style="background-color: whitesmoke">
                    <p class="lead text-center text-dark">To reset your password,enter the registered e-mail address and we weill
                    send you the resest instructions on your email</p>
                    <form action="#" method="post" class="px-3" id="forgot-form">
                        <div id="forgotAlert"></div>
                        <div class="input-group input-group-sm  form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-envelope fa-lg"></i>
                                </span>
                            </div>
                            <input type="email" name="email" id="femail" class="form-control rounded-0" placeholder="E-mail" required>
                        </div>
                        <div class="input-group input-group-sm  form-group">
                        <div class="form-group">
                            <input type="submit" value="Reset Password" id="forgot-btn" class="btn btn-primary btn-lg btn-block myBtn">
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </div></div>


    <div class="row" id="admin-login-box" style="display: none">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 bg-light mt-lg-4">
            <div class="p-5 mt-2 mb-2" style="border: 2px solid #0c5460">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Here</h1>
                </div>
                <form action="#" method="post" class="user" id="admin-form">
                    <div id="adminAlert"></div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"  placeholder="E-mail" required value="
<?php   if (isset($_COOKIE['email'])){echo $_COOKIE['email'];}?>">
                    </div>
                    <div class="form-group">
                        <input type="Password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password"
                               required value="<?php   if(isset($_COOKIE['password'])) {echo $_COOKIE['password']; } ?>">
                    </div>
                    <button type="submit" id="admin-btn" class="btn btn-primary btn-user btn-block">Login</button>
                    <a href="adminpanel.php">Login Now</a>
                </form>
            </div>
        </div>
    </div>
<!--    forgot password form end-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script>
    $(document).ready(function () {
        $("#register-link").click(function () {
            $("#login-box").hide();
            $("#register-box").show();
        });

        $("#login-link").click(function () {
            $("#login-box").show();
            $("#register-box").hide();
        });

        $("#forgot-link").click(function () {
            $("#forgot-box").show();
            $("#login-box").hide();
        });
        $("#back-link").click(function () {
            $("#login-box").show();
            $("#forgot-box").hide();
        });
        $("#admin-login-button").click(function () {
            $("#admin-login-box").show();
           $("#login-box").hide();
           $("#forgot-box").hide();
           $("#registration-box").hide();
        });
        //register ajax request
        $("#register-btn").click(function (e) {
            if ($("#register-form")[0].checkValidity()){
               e.preventDefault();
               $("#register-btn").val('Please Wait...');
               if ($("#rpassword").val() != $("#crpassword").val()){
                  $("#passError").text('* Password did not matched!');
                  $("#register-btn").val('Sign Up');
               }
               else{
                   $("#passError").text('');
                   $.ajax({
                       url: 'assets/php/action.php',
                       method: 'post',
                       data: $("#register-form").serialize()+'&action=register',
                       success:function (response) {
                           $("#register-btn").val('Sign Up');
                           if (response === 'register'){
                               window.location = 'home.php';
                           }
                           else{
                               $("#regAlert").html(response);
                           }
                       }
                   });
               }
            }
        });
        //login ajax request
        $("#login-btn").click(function (e) {
            if ($("#login-form")[0].checkValidity()){
                e.preventDefault();

                $("#login-btn").val('Please Wait');
                $.ajax({
                    url: 'assets/php/action.php',
                    method:'post',
                    data: $("#login-form").serialize()+'&action=login',
                    success:function (response) {
                        $("#login-btn").val('Sign in');
                        if(response === 'login'){
                            window.location ='home.php';
                        }
                        else {
                            $("#loginAlert").html(response);
                        }

                    }
                });
            }
        });

        $("#admin-btn").click(function (e) {
            if ($("#admin-form")[0].checkValidity()){
                e.preventDefault();

                $("#admin-btn").val('Please Wait');
                $.ajax({
                    url: 'assets/php/action.php',
                    method:'post',
                    data: $("#admin-form").serialize()+'&action=admin',
                    success:function (response) {
                        $("#admin-btn").val('Signin');
                        if(response === 'admin'){
                            window.location ='admin.php';
                        }
                        else {
                            $("#adminAlert").html(response);
                        }

                    }
                });
            }
        });
       // forgot password ajax request

        $("#forgot-btn").click(function (e) {
                   if($("#forgot-form")[0].checkValidity()){
                       e.preventDefault();
                       $("#forgot-btn").val('Please wait...');

                       $.ajax({
                           url: 'assets/php/action.php',
                           method: 'post',
                           data: $("#forgot-form").serialize()+'&action=forgot',
                           success:function(response){
                               $("#forgot-btn").val('Reset Password');
                               $("#forgot-form")[0].reset();
                               $("#forgotAlert").html(response);
                       }
                       });
                   }
               });
    });
</script>
</body>
</html>




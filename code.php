<?php
session_start();

$connection = mysqli_connect("localhost","root",""," db_user_system ");

if (isset($_POST['login_btn'])){
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email_login' AND password = '$password_login' ";
    $query_run = mysqli_query($connection,$query);

    if (mysqli_fetch_array($query_run)){
        $_SESSION['username'] = $email_login;
        header('location:adminpanel.php');
    }
    else{
        $_SESSION['status']= 'email/pasword wrong';
        header('location:admin.php');
    }
}

?>

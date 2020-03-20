<?php
require_once  'assets/php/auth.php';
$user = new auth();

$msg ='';
if (isset($_GET['email']) && isset($_GET['action'])){
    $email = $user->test_input($_GET['email']);
    $action = $user->test_input($_GET['actions']);

    $auth_user = $user->send_notification($email,$action);

}
    else{
        header('location:index.php');
        exit();
    }







?>

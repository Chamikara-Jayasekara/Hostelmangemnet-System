<?php
session_start();
require_once 'auth.php';
$cuser = new auth();

if (!isset($_SESSION['user'])){
    header('location:index.php');
    die;
}
$cemail =$_SESSION['user'];

$data = $cuser->currentUser($cemail);

$cid = $data['id'];
$cname = $data['name'];
$cpass = $data['password'];
$cphone = $data['phone'];
$cgender = $data['gender'];
$cdob = $data['dob'];
$cphoto=$data['photo'];
$created = $data['created_at'];
$cregno = $data['regno'];
$cfaculty = $data['faculty'];
$cyear = $data['year'];
$verified = $data['verified'];

$fname = strtok($cname, "");
$reg_on = date('d M Y', strtok($created));

if ($verified == 0){
    $verified = 'Not Verified';
}
else{
    $verified = 'Verified !';
}
?>


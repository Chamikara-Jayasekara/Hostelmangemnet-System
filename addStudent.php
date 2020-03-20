<?php
require_once 'assets/php/config.php';


if (isset($_POST['addNote'])){
    $name = $_POST['sname'];
    $address = $_POST['address'];
    $image = $_FILES["image"]['name'];
    if (file_exists("uploads/".$_FILES["image"]["name"])) {
        $store = $_FILES["image"]["name"];
        $_SESSION['status']="Image already exist. '.$store.'";
        header('location:profile.php');
    }
    else{

        $query= "INSERT INTO student(name ,address,image) VALUES ('$name','$address','$image')";
        $query_run = mysqli_query($conn,$query);

        if ($query_run){
            move_uploaded_file($_FILES["image"]["temp_name"],"uploads/".$_FILES["image"]["name"]);
            $_SESSION['success'] = "Faculty Added";
            header('location:profile.php');
        }
        else{
            $_SESSION['success'] = "Faculty not added";
            header('location:profile.php');
        }
    }



}

?>

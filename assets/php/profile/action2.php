<?php
session_start();
include 'confiq.php';
$update=false;
$id="";
$name="";
$registration_number="";
$faculty="";
$year="";
$course="";
$address="";
$DOB="";
$nic="";
$phone="";
$gender="";
$image="";

if (isset($_POST['adding'])){
    $name=$_POST['name'];
    $registration_number=$_POST['regnum'];
    $faculty=$_POST['fac'];
    $year=$_POST['yea'];
    $course=$_POST['course'];
    $address=$_POST['address'];
    $DOB=$_POST['dob'];
    $nic=$_POST['NIC'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];


    $image=$_FILES['image']['name'];
    $upload="uploads/".$image;

    $query="INSERT INTO crud(name,registration_number,faculty,year,course,address,DOB,nic,phone,gender,image)VALUES(?,?,?,?,?,?,?,?,?,?,?)";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("sssssssssss",$name,$registration_number, $faculty,$year,$course,$address,$DOB,$nic,$phone,$gender,$upload);
    $stmt->execute();
    move_uploaded_file($_FILES['image']['tmp_name'],$upload);

    header('location:profile.php');
    $_SESSION['response']="Successfully Inserted";
    $_SESSION['res_type']="success";
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $query = "SELECT * FROM crud WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $id=$row['id'];
    $name=$row['name'];
    $registration_number=$row['regnum'];
    $faculty=$row['fac'];
    $year=$row['yea'];
    $course=$row['course'];
    $address=$row['address'];
    $DOB=$row['dob'];
    $nic=$row['NIC'];
    $phone=$row['phone'];
    $gender=$row['gender'];
    $update=true;

}
if (isset($_POST['update'])) {
    $id=$_POST['id'];
    $name = $_POST['name'];
    $registration_number = $_POST['regnum'];
    $faculty = $_POST['fac'];
    $year = $_POST['yea'];
    $course = $_POST['course'];
    $address = $_POST['address'];
    $DOB = $_POST['dob'];
    $nic = $_POST['NIC'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $oldimage=$_POST['oldimage'];

    if (isset($_FILES['image']['name'])&&($_FILES['image']['name']!=="")){
        $newimage="uploads/".$_FILES['image']['name'];
        unlink($oldimage);
        move_uploaded_file($_FILES['image']['temp_name'], $newimage);
    }else{
        $newimage=$oldimage;
    }
    $query="UPDATE crud SET name=?,registration_number=?,faculty=?,year=?,course=?,address=?,DOB=?,nic=?,phone=?,gender=?,image=? WHERE id=? ";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("sssssssssssi",$name,$registration_number, $faculty,$year,$course,$address,$DOB,$nic,$phone,$gender,$newimage,$id);
    $stmt->execute();

    $_SESSION['response']="Updated Succesfully";
    $_SESSION['res_type']="primary";
    header('location:profile.php');
}
?>

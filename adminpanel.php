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
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <style>
        .swiper-container {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 300px;
            height: 300px;

        }
    </style>
</head>
<body>
<nav class="navbar">
    <a class="navbar-brand" href="adminpanel.php"><img src="uploads/220px-University_of_Peradeniya_crest.png" alt="uop" style="width:100px;height: 100px"></a>
    <a id="resp-menu" class="responsive-menu" href="#"><i class="fa fa-home"></i> Menu</a>

    <ul class="menu ml-auto">
        <li class="nav-item"><a  style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "home.php")? "active":""; ?> href="adminpanel.php" > <i class="fa fa-home"></i> Home</a></li>
        <li class="nav-item"><a style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "profile.php")? "active":""; ?> href="halls.php"><i class="fa fa-user-circle"></i>Halls</a></li>
        <li class="nav-item"><a style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "feedback.php")? "active":""; ?> href="rooms.php"><i class="fa fa-bed"></i>Rooms</a></li>
        <li class="nav-item"><a style="font-size: 15px"  class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "notification.php")? "active":""; ?> href="latepass.php"><i class="fas fa-bell"></i>Latepass</a></li>
        <li class="nav-item"><a style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "logout.php")? "active":""; ?> href="assets/php/logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
    </ul>
</nav>
<div class="row mt-4 ">
    <div class="col-lg-1"></div>
    <div class="col-lg-4"><h4 class="text-center text-white font-italic">Welcome to Admin Dashborad</h4></div>
</div>
<div class="row" id="firstLine">
    <div class="col-1"></div>
    <div class="col-xl-3 col-sm-6 mb-3 mt-3">
        <div class="card text-dark bg-light o-hidden h-100">
            <div class="card-header">
                <h4>Number of Students</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4"> <div class="card-body-icon">
                            <i class="fa fa-users fa-3x"></i>
                        </div></div>
                    <div class="col-lg-8">   <div class="mr-5">
                            <?php
                            $conn = mysqli_connect("localhost","root","","db_user_system");
                            $sql= "SELECT id FROM users ORDER BY id";
                            $stmt = mysqli_query($conn, $sql);
                            $row = mysqli_num_rows($stmt);
                            echo '<h4>'.$row.'</h4>';
                            ?>
                        </div></div>
                </div>


            </div>
            <a class="card-footer text-dark clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right fa-3x"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3 mt-3">
        <div class="card text-dark bg-light o-hidden h-100">
            <div class="card-header">
                <h4>Late pass requests  <br> <?php

                    echo date("l jS \of F Y ") . "<br>";

                    ?></h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4"> <div class="card-body-icon">
                            <i class="fa fa-key fa-3x"></i>
                        </div></div>
                    <div class="col-lg-8">   <div class="mr-5">
                            <?php
                            $conn = mysqli_connect("localhost","root","","db_user_system");
                            $sql= "SELECT id FROM latepass WHERE  DATE(created_at) = CURDATE() ORDER BY id";
                            $stmt = mysqli_query($conn, $sql);
                            $row = mysqli_num_rows($stmt);
                            echo '<h4>'.$row.'</h4>';
                            ?>
                        </div></div>
                </div>


            </div>
            <a class="card-footer text-dark clearfix small z-1" href="latepass.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right fa-3x"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3 mt-3">
        <div class="card text-dark bg-light o-hidden h-100">
            <div class="card-header">
                <h4>Number of rooms</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4"> <div class="card-body-icon">
                            <i class="fa fa-bed fa-3x"></i>
                        </div></div>
                    <div class="col-lg-8">   <div class="mr-5">
                            <?php
                            $conn = mysqli_connect("localhost","root","","db_user_system");
                            $sql= "SELECT id FROM room1 ORDER BY id";
                            $stmt = mysqli_query($conn, $sql);
                            $row = mysqli_num_rows($stmt);
                            echo '<h4>'.$row.'</h4>';
                            ?>
                        </div></div>
                </div>


            </div>
            <a class="card-footer text-dark clearfix small z-1" href="#"  id="roomDetails">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right fa-3x"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-1"></div>
</div>
<div class="row mt-4">
    <div class="col-lg-4"></div>
    <div class="col-lg-2"><button class="ui green button" id="addhallbutton2" > <i class="fa fa-home fa-3x"></i>&nbsp;Add Hall</button></div>
    <div class="col-lg-2"><button class="ui  blue button" id="addroombutton2" > <i class="fa fa-bed fa-3x"></i>&nbsp;Add Room</button></div>
</div>
<section id="addhalls" style="display: none">
        <div class="row" >
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <form class="ui form my-5 p-4 bg-light" id="add-hall-form" style="border: 2px solid #6f42c1" >
                    <div class="field">
                        <div class="two fields">
                            <div class="field">
                                <label>Hall Name</label>
                                <select class="ui fluid dropdown" type="text"  name="name" id="name" >
                                    <option value="Arunachalam Hall">Arunachalam Hall</option>
                                    <option value="Akbar Nell Hall">Akbar Nell Hall</option>
                                    <option value="Jayathilake Hall">Jayathilake Hall</option>
                                    <option value="Marrs Hall">Marrs Hall</option>
                                    <option value="Marcus Fernando Hall">Marcus Fernando Hall</option>
                                    <option value="Nishmi Hall">Nishmi Hall</option>
                                    <option value="Sarasaviuyana Hall">Sarasaviuyana Hall</option>
                                    <option value="Hindagala Hall">Hindagala Hall</option>
                                    <option value="James Peris Hall">	James Peris Hall</option>
                                    <option value="Ramanathan Hall">Ramanathan Hall</option>
                                    <option value="Sangamitta Hall">Sangamitta Hall</option>
                                    <option value="Hilda Obeysekara Hall">Hilda Obeysekara Hall</option>
                                    <option value="Wijewardana Hall">Wijewardana Hall</option>
                                    <option value="Ivor Jennings Hall">Ivor Jennings Hall</option>
                                    <option value="Kehelpannala  Bikku Hostel">Kehelpannala  Bikku Hostel</option>
                                    <option value="Sangaramaya  Bikku Hostel">Sangaramaya  Bikku Hostel</option>
                                    <option value="Ediriweera Sarachchandra Hall">	Ediriweera Sarachchandra Hall</option>
                                    <option value="Gunapala Malalasekara Hall">Gunapala Malalasekara Hall</option>
                                    <option value="Lalith Athulathmudali Hall">Lalith Athulathmudali Hall</option>
                                    <option value="Sarasavi Medura Hall">Sarasavi Medura Hall</option>

                                </select>
                            </div>
                            <div class="field">
                                <label>Hall address</label>
                                <input type="text" name="address"  placeholder="location">
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="two fields">
                            <div class="field">
                                <label>Rooms</label>
                                <input type="text" name="rooms"  placeholder="Number of rooms">
                            </div>
                            <div class="field">
                                <label>Hall Type</label>
                                <select class="ui fluid dropdown" type="text"  name="type" id="type" >
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Bikku">Bikku</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <input class="ui button" type="submit" id="addhallBtn" value="Add hall"></input>
                </form>
            </div>
        </div>

    </section>
<section id="addrooms" style="display: none">
    <div class="row" >
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <form class="ui form my-5 p-4 bg-light"  id="add-room-form" style="border: 2px solid #6f42c1" >
                 <div class="field">
                    <div class="two fields">
                        <div class="field">
                            <label>Hall name</label>
                            <select class="ui fluid dropdown" type="text" name="names" id="names" >
                                <option value="Arunachalam Hall">Arunachalam Hall</option>
                                <option value="Akbar Nell Hall">Akbar Nell Hall</option>
                                <option value="Jayathilake Hall">Jayathilake Hall</option>
                                <option value="Marrs Hall">Marrs Hall</option>
                                <option value="Marcus Fernando Hall">Marcus Fernando Hall</option>
                                <option value="Nishmi Hall">Nishmi Hall</option>
                                <option value="Sarasaviuyana Hall">Sarasaviuyana Hall</option>
                                <option value="Hindagala Hall">Hindagala Hall</option>
                                <option value="James Peris Hall">	James Peris Hall</option>
                                <option value="Ramanathan Hall">Ramanathan Hall</option>
                                <option value="Sangamitta Hall">Sangamitta Hall</option>
                                <option value="Hilda Obeysekara Hall">Hilda Obeysekara Hall</option>
                                <option value="Wijewardana Hall">Wijewardana Hall</option>
                                <option value="Ivor Jennings Hall">Ivor Jennings Hall</option>
                                <option value="Kehelpannala  Bikku Hostel">Kehelpannala  Bikku Hostel</option>
                                <option value="Sangaramaya  Bikku Hostel">Sangaramaya  Bikku Hostel</option>
                                <option value="Ediriweera Sarachchandra Hall">	Ediriweera Sarachchandra Hall</option>
                                <option value="Gunapala Malalasekara Hall">Gunapala Malalasekara Hall</option>
                                <option value="Lalith Athulathmudali Hall">Lalith Athulathmudali Hall</option>
                                <option value="Sarasavi Medura Hall">Sarasavi Medura Hall</option>                            </select>
                        </div>
                        <div class="field">
                            <label>Room Number</label>
                            <input type="text" name="number"  id="number" placeholder="location">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="two fields">
                        <div class="field">
                            <label>Key</label>
                            <input type="text" name="nkey"  placeholder="Number of key">
                        </div>
                        <div class="field">
                            <label>	bulbs</label>
                            <input type="text" name="bulbs"  id="bulbs" placeholder="Number of bulbs">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="two fields">
                        <div class="field">
                            <label>tables</label>
                            <input type="text" name="tables"  placeholder="Number of tables">
                        </div>
                        <div class="field">
                            <label>beds</label>
                            <input type="text" name="beds"  placeholder="Number of beds">
                        </div>

                    </div>
                </div>
                <div class="field">
                    <div class="two fields">
                        <div class="field">
                            <label>	chairs</label>
                            <input type="text" name="chairs"  placeholder="Number of chairs">
                        </div>
                        <div class="field">
                            <label>cupboards</label>
                            <input type="text" name="cupboards"  placeholder="Number of cupboards">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>racks</label>
                    <input type="text" name="racks"  placeholder="Number of racks">
                </div>
                <input class="ui button" type="submit" id="addRoomBtn" value="Add room"></input>
            </form>
        </div>
    </div>

</section></section>
<section id="bookedRooms">
    <div class="swiper-container" id="x">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image:url(uploads/aru.PNG)">
                <div class="card">
                    <div class="card-header">
                        <h5>Arunachalam Hall</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Arunachalam Hall' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>

            </div>
            <div class="swiper-slide" style="background-image:url(uploads/akbarnell.PNG)">
                    <div class="card">
                        <div class="card-header">
                           <h5>Akbar Nell Hall</h5>
                        </div>
                        <div class="card-body">
                            <h5>Booked Rooms</h5>
                            <?php
                            $conn = mysqli_connect("localhost","root","","db_user_system");
                            $sql= "SELECT id FROM room1 WHERE name='Akbar Nell Hall' ORDER BY id";
                            $stmt = mysqli_query($conn, $sql);
                            $result = mysqli_num_rows($stmt);
                            echo '<h4>'.$result.'</h4>';
                            ?>
                        </div>
                    </div>
            </div>
            <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>Jayathilaka Hall</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Jayathilake Hall' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
            <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>Marrs Hall</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Marrs Hall' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
            <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>Marcus Fernando Hall</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Marcus Fernando Hall' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
			   <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>Nishmi Hall</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Nishmi Hall' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
			   <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>Sarasaviuyana Hall</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Sarasaviuyana Hall' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
			   <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>Hindagala Hall</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Hindagala Hall' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
			   <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>James Peris Hall</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='James Peris Hall' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
			   <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>Ramanathan Hall</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Ramanathan Hall' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
			   <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>Sangamitta Hall</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Sangamitta Hall' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
			   <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>Hilda Obeysekara Hall</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Hilda Obeysekara Hall' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
			   <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>Wijewardana Hall</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Wijewardana Hall' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
			   <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>Ivor Jennings Hall</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Ivor Jennings Hall' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
			   <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>Kehelpannala  Bikku Hostel</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Kehelpannala  Bikku Hostel' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
			   <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>Sangaramaya  Bikku Hostel</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Sangaramaya  Bikku Hostel' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
			   <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>Ediriweera Sarachchandra Hall</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Ediriweera Sarachchandra Hall' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
			   <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>Gunapala Malalasekara Hall</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Gunapala Malalasekara Hall' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
				   <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>Lalith Athulathmudali Hall</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Lalith Athulathmudali Hall' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
				   <div class="swiper-slide" style="background-image:url()">
                <div class="card">
                    <div class="card-header">
                        <h5>Sarasavi Medura Hall</h5>
                    </div>
                    <div class="card-body">
                        <h5>Booked Rooms</h5>
                        <?php
                        $conn = mysqli_connect("localhost","root","","db_user_system");
                        $sql= "SELECT id FROM room1 WHERE name='Sarasavi Medura Hall' ORDER BY id";
                        $stmt = mysqli_query($conn, $sql);
                        $result = mysqli_num_rows($stmt);
                        echo '<h4>'.$result.'</h4>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="assets/css/swiper.min.js"></script>
<script>
    var swiper = new Swiper('#x', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows : true,
        },
        pagination: {
            el: '.swiper-pagination',
        },
    });
</script>
<script>
    $(document).ready(function () {
        var touch 	= $('#resp-menu');
        var menu 	= $('.menu');

        $(touch).on('click', function(e) {
            e.preventDefault();
            menu.slideToggle();
        });

        $(window).resize(function(){
            var w = $(window).width();
            if(w > 767 && menu.is(':hidden')) {
                menu.removeAttr('style');
            }
        });
        $("#addhallbutton2").click(function () {
            $("#addrooms").hide();
            $("#addhalls").show();
            $("#bookedRooms").hide();
        });
        $("#addroombutton2").click(function () {
            $("#addrooms").show();
            $("#addhalls").hide();
            $("#bookedRooms").hide();
        });
        $("#roomDetails").click(function () {
            $("#bookedRooms").show();
            $("#addrooms").hide();
            $("#addhalls").hide();
            $("#firstLine").hide();
        });
        //adhostal
        $("#addhallBtn").click(function (e) {
            if ($("#add-hall-form")[0].checkValidity()){
                e.preventDefault();
                $("#addhallBtn").val('please wait');
                $.ajax({
                    url: 'assets/php/process.php',
                    method : 'post',
                    data: $("#add-hall-form").serialize()+'&action=add_hall',
                    success:function (response) {
                        $("#addhallBtn").val('Add Details');
                        swal.fire({
                            title : 'Your details added successfully,Check your details below and If any error please edit',
                            type : 'success'
                        });
                        if (response === 'add_hall'){
                            window.location ='adminpanel.php';
                        }else{}
                    }
                });
            }

        });
//addroom
        $("#addRoomBtn").click(function (e) {
            if ($("#add-room-form")[0].checkValidity()){
                e.preventDefault();

                $("#addRoomBtn").val('please wait');
                $.ajax({
                    url: 'assets/php/process.php',
                    method : 'post',
                    data: $("#add-room-form").serialize()+'&action=add_room',
                    success:function (response) {
                        $("#addRoomBtn").val('Add Details');
                        swal.fire({
                            title : 'Your details added successfully,Check your details below and If any error please edit',
                            type : 'success'
                        });
                        $("#add-room-form")[0].reset();
                        if (response === 'add_room'){
                            window.location ='adminpanel.php';

                        }else{}
                        location.reload();
                    }
                });
            }
        });


    });
</script>
</body>
</html>

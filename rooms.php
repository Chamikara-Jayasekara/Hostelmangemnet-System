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
</head>
<body>
<nav class="navbar">
    <a class="navbar-brand" href="adminpanel.php"><img src="uploads/220px-University_of_Peradeniya_crest.png" alt="uop" style="width:100px;height: 100px"></a>
    <a id="resp-menu" class="responsive-menu" href="#"><i class="fa fa-home"></i> Menu</a>

    <ul class="menu ml-auto">
        <li class="nav-item"><a  style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "home.php")? "active":""; ?> href="adminpanel.php" > <i class="fa fa-home"></i> Home</a></li>
        <li class="nav-item"><a style="font-size: 15px"  class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "profile.php")? "active":""; ?> href="halls.php"><i class="fa fa-user-circle"></i>Halls</a></li>
        <li class="nav-item"><a  style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "feedback.php")? "active":""; ?> href="rooms.php"><i class="fa fa-bed"></i>Rooms</a></li>
        <li class="nav-item"><a style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "notification.php")? "active":""; ?> href="latepass.php"><i class="fa fa-bell"></i>Latepass</a></li>
        <li class="nav-item"><a style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "logout.php")? "active":""; ?> href="assets/php/logout.php"><i class="fa fa-sign-out-alt"></i>Log out</a></li>
    </ul>
</nav>


<section>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 text-white"><h4 class="mt-4 font-weight-bolder text-center">Select your hall and see your hall room details</h4></div>
        <div class="col-lg-4"></div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-head">
                    <h4 class="text-center">Arunachalam Hall</h4>

                </div>
                <a class="card-footer text-dark clearfix small z-1" href="#" id="arubtn">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                  <i class="fa fa-angle-right fa-3x"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-head">
                    <h4 class="text-center">James Peiris Hall</h4>
                </div>
                <a class="card-footer text-dark clearfix small z-1" href="#" id="jpbtn">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                  <i class="fa fa-angle-right fa-3x"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-head">
                    <h4 class="text-center">James Peiris Hall</h4>
                </div>
                <a class="card-footer text-dark clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                  <i class="fa fa-angle-right fa-3x"></i>
                </span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-1"></div>
</section>
<div class="row mt-2">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">

            <div class="row">

                <div class="table-responsive bg-light" id="ArunachalamRooms">
                </div>
            </div>


    </div>
    <div class="col-lg-1"></div>
</div>
<div class="row mt-2">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class="table-responsive bg-light" id="JPRooms">
        </div>
    </div>
    <div class="col-lg-1"></div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function() {
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
        $("#arubtn").click(function () {
            $("#ArunachalamRooms").show();
            $("#JPRooms").hide();
        });

        $("#jpbtn").click(function () {
            $("#ArunachalamRooms").hide();
            $("#JPRooms").show();
        });
        $("#arubtn").click(function (e) {
            ArunachalamRooms();

            function ArunachalamRooms() {
                $.ajax({
                    url:'assets/php/process.php',
                    method: 'post',
                    data: { action: 'ArunachalamRooms'},
                    success:function (response) {
                        $("#ArunachalamRooms").html(response);
                    }
                });
            }
        });
        $("#jpbtn").click(function (e) {
            JPRooms();

            function JPRooms() {
                $.ajax({
                    url:'assets/php/process.php',
                    method: 'post',
                    data: { action: 'JPRooms'},
                    success:function (response) {
                        $("#JPRooms").html(response);
                    }
                });
            }
        });
        filterList();
        function  filterList() {
            $.ajax({
                url: 'assets/php/process.php',
                method: 'post',
                data: {action: 'filterList'},
                success: function (response) {
                    $('#filterList').html(response);
                }
            });
        }
        });
</script>
</body>
</html>

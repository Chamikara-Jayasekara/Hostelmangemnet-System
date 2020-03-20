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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
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
        <li class="nav-item"><a style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "home.php")? "active":""; ?> href="adminpanel.php" > <i class="fa fa-home"></i> Home</a></li>
        <li class="nav-item"><a style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "profile.php")? "active":""; ?> href="halls.php"><i class="fa fa-user-circle"></i>Halls</a></li>
        <li class="nav-item"><a style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "feedback.php")? "active":""; ?> href="rooms.php"><i class="fa fa-bed"></i>Rooms</a></li>
        <li class="nav-item"><a style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "feedback.php")? "active":""; ?> href="filter.php"><i class="fa fa-bed"></i>Filter</a></li>
        <li class="nav-item"><a style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "notification.php")? "active":""; ?> href="latepass.php"><i class="fas fa-bell"></i>Latepass</a></li>
        <li class="nav-item"><a style="font-size: 15px"  class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "logout.php")? "active":""; ?> href="assets/php/logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
    </ul>
</nav>
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4 text-white"><h4 class="mt-4 font-weight-bolder text-center">Latepass Details for
            <?php

            // Prints the day, date, month, year, time, AM or PM
            echo date("l jS \of F Y ") . "<br>";

            ?></h4></div>
    <div class="col-lg-4"></div>
</div>
<div class="row mt-2">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class="table-responsive bg-light" id="showlatepass">
            <p class="text-center lead mt-4">Please wait</p>

        </div>
    </div>
    <div class="col-lg-1"></div>
</div>

<div class="modal fade" id="actionModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="exampleModalLabel">You Can accept or reject the students late passes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" >
                    <div class="col-lg-12">
                        <form class="ui form my-5  p-4 border border-primary" id="edit-latepass-form" >
                            <input type="hidden" name="id" id="id">
                            <div class="field">
                                <div class="two fields">
                                    <div class="field">
                                        <label>Name</label>
                                        <input type="text" name="name" id="names" placeholder="Full Name">
                                    </div>
                                    <div class="field">
                                        <label>Registration Number</label>
                                        <input type="text" name="regno" id="regno" placeholder="Registration Number">
                                    </div>
                                </div>
                            </div>
                            <select class="ui fluid dropdown" type="text"  name="actions" id="actions" >
                                <option value="Approved">Accept</option>
                                <option value="Not Approved">Not Accept</option>

                            <input class="ui button mt-4 bg-info text-light" type="submit" name="LatePassBtn" id="LatePassBtn" value="Send Late pass Action"></input>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function(){
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

        displayLatePass();
        function  displayLatePass() {
            $.ajax({
                url: 'assets/php/process.php',
                method: 'post',
                data: { action: 'display_latePass'},
                success:function (response) {
                    $('#showlatepass').html(response);
                }
            });
        }

        displayRooms();

        function displayRooms() {
            $.ajax({
                url:'assets/php/process.php',
                method: 'post',
                data: { action: 'display_rooms'},
                success:function (response) {
                   $("#showrooms").html(response);
                }
            });
        }

        //edit note of an user ajax request
        $("body").on("click", ".latepassBtn", function (e) {
            e.preventDefault();

            edit_lp = $(this).attr('id');
            console.log(edit_lp);
            $.ajax({
                url: 'assets/php/process.php',
                method: 'post',
                data: {edit_lp : edit_lp},
                success:function (response) {
                    data = JSON.parse(response);
                      $("#id").val(data.id);
                    $("#actions").val(data.actions);
                    $("#names").val(data.name);
                    $("#regno").val(data.regno);
                }
            });
        });
//update note of an user ajax request
        $("#LatePassBtn").click(function (e) {
            if ($("#edit-latepass-form")[0].checkValidity()){
                e.preventDefault();

                $.ajax({
                    url: 'assets/php/process.php',
                    method:'post',
                    data: $("#edit-latepass-form").serialize()+"&action=update_latepass",
                    success:function (response) {
                        Swal.fire({
                            title: 'Late pass action get successfully!',
                            type: 'success',
                        });
                        $("#edit-latepass-form")[0].reset();
                        $("#actionModal2").modal('hide');
                        displayLatePass();
                    }
                });
            }
        });
        //send email function
        $("#LatePassBtn").click(function (e) {
                $.ajax({
                    url: 'assets/php/action.php',
                    method: 'post',
                    data: { action: 'notification'},
                    success:function(response){
                        Swal.fire({
                            title: 'Action send successfully',
                            type: 'success',
                        });
                    }
                });
        });
        $("#search_text").keyup(function(){
            var search = $(this).val();
            $.ajax({
                url:'assets/php/search.php',
                method:'post',
                data:{query:search},
                success:function(response){
                    $("#table-data").html(response);
                }
            });
        });

        $("#search_text").keyup(function() {
            var searchText = $(this).val();
            if (searchText!= ''){
                $.ajax({
                   url:'assets/php/autocomplete.php',
                   method: 'post',
                    data:{query:searchText},
                    success:function (response) {
                        $("#show-list").html(response);
                    }
                });
            }
            else {
                $("#show-list").html('');
            }


        });
        $(document).on('click','a',function () {
           $("#search_text").val($(this).text());
           $("#show-list").html('');
        });
 });
</script>
</body>
</html>

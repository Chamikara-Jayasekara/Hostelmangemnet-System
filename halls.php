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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/sp-1.0.1/datatables.min.css"/>
</head>
<body>
<nav class="navbar">
    <a class="navbar-brand" href="adminpanel.php"><img src="uploads/220px-University_of_Peradeniya_crest.png" alt="uop" style="width:100px;height: 100px"></a>
    <a id="resp-menu" class="responsive-menu" href="#"><i class="fa fa-home"></i> Menu</a>

    <ul class="menu ml-auto">
        <li class="nav-item"><a style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "home.php")? "active":""; ?> href="adminpanel.php" > <i class="fa fa-home"></i> Home</a></li>
        <li class="nav-item"><a style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "profile.php")? "active":""; ?> href="halls.php"><i class="fa fa-user-circle"></i>Halls</a></li>
        <li class="nav-item"><a style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "feedback.php")? "active":""; ?> href="rooms.php"><i class="fa fa-bed"></i>Rooms</a></li>
        <li class="nav-item"><a  style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "notification.php")? "active":""; ?> href="latepass.php"><i class="fas fa-bell"></i>Latepass</a></li>
        <li class="nav-item"><a style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "logout.php")? "active":""; ?> href="assets/php/logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
    </ul>
</nav>
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4 text-white"><h4 class="mt-4 font-weight-bolder text-center">Halls Details</h4></div>
    <div class="col-lg-4"></div>
</div>
<div class="row">
    <div class="col-lg-1"></div>
<div class="col-lg-10">
    <div class="row" id="result">
        <?php
        $conn = new mysqli("localhost","root","","db_user_system");

        if ($conn->connect_error){
            die("Could not connect to database!".$conn->connect_error);
        }
        $sql="SELECT * FROM hall";
        $result=$conn->query($sql);
        ?>
        <div class="table-responsive-md ml-2">
        <table class="table bg-light" id="hallTable"  style="width: 80vw">
            <thead class="bg-light">
            <tr class="bg-light">
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Rooms</th>
                <th scope="col">Hall Type</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row=$result->fetch_assoc()){ ?>
                <tr>
                    <td class="bg-light"><?= $row['name'];?></td>
                    <td class="bg-light"><?= $row['address'];?></td>
                    <td class="bg-light"><?= $row['no_of_rooms'];?></td>
                    <td class="bg-light"><?= $row['hostal_type'];?></td>
                    <td class='bg-light'>
                        <a href='#' id=<?=$row['id'];?> title='Latepass' class='text-danger editHallBtn'>
                            <i class='fas fa-edit fa-2x' data-toggle='modal' data-target='#hallModal'></i>
                        </a>
                    </td>
                </tr>


            <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
    <div class="col-lg-1"></div>
</div>
<div class="modal fade" id="hallModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">You Can Edit room details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" >
                    <div class="col-lg-12">
                        <form class="ui form my-5  p-4 border border-danger" id="edit-hall-form">
                            <input type="hidden" name="id" id="id">
                            <div class="field">
                                <div class="two fields">
                                    <div class="field">
                                        <label>Hall Name</label>
                                        <input type="text" name="names" id="names" placeholder="Hall Name">
                                    </div>

                                    <div class="field">
                                        <label>Hall Address</label>
                                        <input type="text" name="address" id="address" placeholder="Hall Address">
                                    </div>
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label>Rooms</label>
                                        <input type="text" name="no_of_rooms" id="no_of_rooms" placeholder="No Of Rooms">
                                    </div>
                                    <div class="field">
                                        <label>Hall Type</label>
                                        <select class="ui fluid dropdown" type="text"  name="hostal_type" id="hostal_type" >
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Bikku">Bikku</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <input class="ui button mt-4 bg-danger text-light" type="submit" name="hallEditBtn" id="hallEditBtn" value="Send Room Details"></input>
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
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/sp-1.0.1/datatables.min.js"></script>
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
        $('#hallTable').DataTable();
        displayhall();
        function displayhall() {
            $.ajax({
                url:'assets/php/process.php',
                method: 'post',
                data: { action: 'display_hall'},
                success:function (response) {
                    $("#showhall").html(response);
                }
            });
        }
        $("body").on("click", ".editHallBtn", function (e) {
            e.preventDefault();

            edit_hall = $(this).attr('id');
            $.ajax({
                url: 'assets/php/process.php',
                method: 'post',
                data: {edit_hall : edit_hall},
                success:function (response) {
                    data = JSON.parse(response);
                    $("#id").val(data.id);
                    $("#names").val(data.name);
                    $("#address").val(data.address);
                    $("#no_of_rooms").val(data.no_of_rooms);
                    $("#hostal_type").val(data.hostal_type);

                }
            });
        });
        $("#hallEditBtn").click(function (e) {
            if ($("#edit-hall-form")[0].checkValidity()){
                e.preventDefault();

                $.ajax({
                    url: 'assets/php/process.php',
                    method:'post',
                    data: $("#edit-hall-form").serialize()+"&action=update_halls",
                    success:function (response) {
                        console.log(response);
                        Swal.fire({
                            title: 'Hall details edited and student added successfully!',
                            type: 'success',
                        });
                        $("#edit-hall-form")[0].reset();
                        $("#hallModal").modal('hide');
                        location.reload();
                    }
                });
            }
        });
    });
    </script>
</body>
</html>

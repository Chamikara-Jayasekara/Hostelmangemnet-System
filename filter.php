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
        <li class="nav-item"><a style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "feedback.php")? "active":""; ?> href="filter.php"><i class="fa fa-bed"></i>Filter</a></li>
        <li class="nav-item"><a style="font-size: 15px" class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "notification.php")? "active":""; ?> href="latepass.php"><i class="fas fa-bell"></i>Latepass</a></li>
        <li class="nav-item"><a style="font-size: 15px"  class="nav-link" <?= basename($_SERVER['PHP_SELF'] == "logout.php")? "active":""; ?> href="assets/php/logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
    </ul>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2">

                    <hr class="bg-light">
                    <h5 class="text-light">Select Rooms by Hostal</h5>
                    <hr class="bg-light">
                    <ul class="list-group">
                        <?php
                        $conn = new mysqli("localhost","root","","db_user_system");

                        if ($conn->connect_error){
                            die("Could not connect to database!".$conn->connect_error);
                        }
                        $sql="SELECT DISTINCT name FROM room1 ORDER BY name";
                        $result=$conn->query($sql);
                        while($row=$result->fetch_assoc()){
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label" style="font-size: 12px">
                                    <input type="checkbox" class="form-check-input hall-check"
                                           value="<?= $row['name']; ?>" id="name"> <?= $row['name'];
                                    ?>
                                </label>
                                <?php } ?>

                            </div>
                        </li>

                    </ul>
                </div>

        <div class="col-lg-9">
            <hr class="bg-light">
            <h5 class="text-center text-light" id="textChange">All Room Details</h5>
            <hr class="bg-light">
            <div class="row" id="result">
                <?php
                $conn = new mysqli("localhost","root","","db_user_system");

                if ($conn->connect_error){
                    die("Could not connect to database!".$conn->connect_error);
                }
                $sql="SELECT * FROM room1";
                $result=$conn->query($sql);
                ?>
                <div class="table-responsive-md ml-2">
                <table class="table bg-light" id="myTable"  style="width: 80vw">
                    <thead class="bg-light">
                    <tr class="bg-light">
                        <th scope="col">Hall name</th>
                        <th scope="col">Room number</th>
                        <th scope="col">bulbs</th>
                        <th scope="col">tables</th>
                        <th scope="col">keys</th>
                        <th scope="col">beds</th>
                        <th scope="col">cupboards</th>
                        <th scope="col">racks</th>
                        <th scope="col">chairs</th>
                        <th scope="col">Current Students</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php while($row=$result->fetch_assoc()){ ?>
                 <tr>
                        <td class="bg-light"><?= $row['name'];?></td>
                        <td class="bg-light"><?= $row['number'];?></td>
                        <td class="bg-light"><?= $row['bulbs'];?></td>
                        <td class="bg-light"><?= $row['tables'];?></td>
                        <td class="bg-light"><?= $row['nkey'];?></td>
                        <td class="bg-light"><?= $row['beds'];?></td>
                        <td class="bg-light"><?= $row['cupboard'];?></td>
                        <td class="bg-light"><?= $row['racks'];?></td>
                        <td class="bg-light"><?= $row['chairs'];?></td>
                        <td class="bg-light">
                            <ol>
                                <li><?= $row['student1'];?></li>
                                <li><?= $row['student2'];?></li>
                                <li><?= $row['student3'];?></li>
                                <li><?= $row['student4'];?></li>
                            </ol>
                        </td>
                     <td class='bg-light'>
                         <a href='#' id=<?=$row['id'];?> title='Latepass' class='text-info editRoomBtn'>
                             <i class='fas fa-edit fa-2x' data-toggle='modal' data-target='#actionModal'></i>
                         </a>
                     </td>
                    </tr>


                <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="actionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="exampleModalLabel">You Can Add Students to the room and Edit room details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" >
                    <div class="col-lg-12">
                        <form class="ui form my-5  p-4 border border-info" id="edit-room-form">
                            <input type="hidden" name="id" id="id">
                            <div class="field">
                                <div class="two fields">
                                    <div class="field">
                                        <label>Hall Name</label>
                                        <select class="ui fluid dropdown" type="text"  name="name" id="names" placeholder="Hall Name" >
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
                                            <option value="	Ediriweera Sarachchandra Hall">	Ediriweera Sarachchandra Hall</option>
                                            <option value="Gunapala Malalasekara Hall">Gunapala Malalasekara Hall</option>
                                            <option value="Lalith Athulathmudali Hall">Lalith Athulathmudali Hall</option>
                                            <option value="Sarasavi Medura Hall">Sarasavi Medura Hall</option>

                                        </select>
                                    </div>
                                    <div class="field">
                                        <label>Room Number</label>
                                        <input type="text" name="number" id="number" placeholder="Room Number">
                                    </div>
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label>Bulbs</label>
                                        <input type="text" name="bulbs" id="bulbs" placeholder="Bulbs">
                                    </div>
                                    <div class="field">
                                        <label>Tables</label>
                                        <input type="text" name="tables" id="tables" placeholder="Tables">
                                    </div>
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label>Keys</label>
                                        <input type="text" name="nkey" id="nkey" placeholder="Keys">
                                    </div>
                                    <div class="field">
                                        <label>Beds</label>
                                        <input type="text" name="beds" id="beds" placeholder="Beds">
                                    </div>
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label>Cupboards</label>
                                        <input type="text" name="cupboard" id="cupboard" placeholder="Cupboards">
                                    </div>
                                    <div class="field">
                                        <label>Racks</label>
                                        <input type="text" name="racks" id="racks" placeholder="Racks">
                                    </div>
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label>Chairs</label>
                                        <input type="text" name="chairs" id="chairs" placeholder="Chairs">
                                    </div>
                                    <div class="field">
                                        <label>Add students to rooms</label>
                                            <input type="text" name="student1" id="student1" placeholder="student1">
                                            <input type="text" name="student2" id="student2" placeholder="student2">
                                            <input type="text" name="student3" id="student3" placeholder="student3">
                                             <input type="text" name="student4" id="student4" placeholder="student4">

                                    </div>
                                </div>
                            </div>

                            <input class="ui button mt-4 bg-info text-light" type="submit" name="RoomEditBtn" id="RoomEditBtn" value="Send Room Details"></input>
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
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/sp-1.0.1/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
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

        $(".hall-check").click(function(){


            var action = 'data';
            var name = get_filter_text('name');
            var number = get_filter_text('number');
            var bulbs = get_filter_text('bulbs');
            var nkey = get_filter_text('nkey');
            var chairs = get_filter_text('chairs');

            $.ajax({
                url:'assets/php/filterRoom.php',
                method:'POST',
                data:{action:action,name:name,number:number,bulbs:bulbs,nkey:nkey,chairs:chairs},
                success:function(response){
                    $("#result").html(response);
                }
            });
        });

        function get_filter_text(text_id){
            var filterData = [];
            $('#'+text_id+':checked').each(function(){
                filterData.push($(this).val());

            });
            return filterData;
            onChange=doReload(this.value);
        }
        $('#myTable').DataTable();

        $("body").on("click", ".editRoomBtn", function (e) {
            e.preventDefault();

            edit_room = $(this).attr('id');
            $.ajax({
                url: 'assets/php/process.php',
                method: 'post',
                data: {edit_room : edit_room},
                success:function (response) {
                    data = JSON.parse(response);
                    $("#id").val(data.id);
                    $("#names").val(data.name);
                    $("#number").val(data.number);
                    $("#bulbs").val(data.bulbs);
                    $("#tables").val(data.tables);
                    $("#nkey").val(data.nkey);
                    $("#beds").val(data.beds);
                    $("#cupboard").val(data.cupboard);
                    $("#racks").val(data.racks);
                    $("#chairs").val(data.chairs);
                    $("#student1").val(data.student1);
                    $("#student2").val(data.student2);
                    $("#student3").val(data.student3);
                    $("#student4").val(data.student4);
                }
            });
        });

        $("#RoomEditBtn").click(function (e) {
            if ($("#edit-room-form")[0].checkValidity()){
                e.preventDefault();

                $.ajax({
                    url: 'assets/php/process.php',
                    method:'post',
                    data: $("#edit-room-form").serialize()+"&action=update_rooms",
                    success:function (response) {
                        Swal.fire({
                            title: 'Rooms details edited and student added successfully!',
                            type: 'success',
                        });
                        $("#edit-room-form")[0].reset();
                        $("#actionModal").modal('hide');
                        location.reload();
                    }
                });
            }
        });



    });
</script>

</body>
</html>

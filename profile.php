<?php
require_once 'assets/php/header.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hostel Management system</title>
    <link rel="stylesheet" href="assets/css/semantic.min.css">
    <link rel="stylesheet" href="assets/php/css/navstyle.css">
</head>
<body>
<div class="row" id="show">

</div>
<div class="row">
    <div class="col-lg-9"></div>
    <div class="col-lg-3">

        <button class="ui success button" data-toggle="modal" data-target="#exampleModalCenter">Add Image</button>
        <button class="ui purple button" data-toggle="modal" data-target="#changepw">Change password</button>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data" id="profile-update-form">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Choose your file</label>
                                <input type="file" class="form-control-file" name="image"  id="profilePhoto">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="profile_update" value="Change/Add Photo" id="profileUpdateBtn">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="changepw" tabindex="-1" role="dialog" aria-labelledby="change" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="change">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="changepassAlert"></div>
                        <form action="" method="post" id="change-pass-from">
                            <div class="form-group">
                                <label >Old Password</label>
                                <input type="password" class="form-control" name="curpass"  id="curpass" >
                            </div>
                            <div class="form-group">
                                <label>New password</label>
                                <input type="password" class="form-control" name="newpass" id="newpass" >
                            </div>
                            <div class="form-group">
                                <label>Confirm password</label>
                                <input type="password" class="form-control" name="cnewpass" id="cnewpass">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="changepass" value="Change Password" id="changePassBtn">
                            </div>
                            <div class="form-group">
                                <p id="changepassEror" class="text-dabger" ></p>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
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




        displayStudentDetails();
        //Display student details
        function displayStudentDetails() {
            $.ajax({
                url: 'assets/php/profileProcess.php',
                method: 'post',
                data:{
                    action: 'display_student_details'
                },
                success:function (response) {
                    $("#show").html(response);
                }
            });
        }


        // //edit note of an ajax request
        $("body").on("click", ".editBtn", function (e) {
            e.preventDefault();

            edit_id = $(this).attr('id');
            $.ajax({
                url : 'assets/php/profileProcess.php',
                method: 'post',
                data:{
                    edit_id: edit_id
                },
                success:function(response) {
                    data = JSON.parse(response);
                  $("#id").val(data.id);
                  $("#title").val(data.title);
                  $("#note").val(data.note);
                }
            });
        });






    });

</script>
<script>
    $(document).ready(function(){
        //change password ajax
        $("#changePassBtn").click(function (e) {
            if($("#change-pass-from")[0].checkValidity()){
                e.preventDefault();
                $("#changePassBtn").val('please wait');

                if ($("#newpass").val() != $("#cnewpass").val()){
                    $("#changepassEror").text('* passwords did not match!');
                    $("#changePassBtn").val('Change Password');
                }
            else{
                    $.ajax({
                        url : 'assets/php/process.php',
                        method : 'post',
                        data: $("#change-pass-from").serialize()+'&action=change_pass',
                        success:function (response) {
                            $("#changepassAlert").html(response);
                            $("#changePassBtn").val('Changed password');
                            $("#changepassEror").text('');
                            $("#change-pass-from")[0].reset();
                        }
                    });
                }
            }
        });


    });
</script>
</body>
</html>


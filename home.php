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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/semantic.min.css">
    <link rel="stylesheet" href="assets/css/navstyle.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="row">
    <div class="col-lg-4">
        <p class="ui teal tag label mt-2">Hi!&nbsp;<?= $fname;?></p>
    </div>
<!--    <div class="col-lg-6">-->
<!--        <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">-->
<!--            --><?php //if ($verified = 'Not Verified!'): ?>
<!--            <strong>Your Email is not verified! Please check your E-mail and verify your account</strong>-->
<!--            --><?php //endif; ?>
<!--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
<!--                <span aria-hidden="true">&times;</span>-->
<!--            </button>-->
<!---->
<!--        </div>-->
<!--    </div>-->
</div>
<section id="restriction-box" >
<div class="row mt-3 mb-2">
    <div class="col-lg-1"></div>
    <div class="col-lg-10" style="font-family: sans-serif;
    font-size: 10px;">
        <h4 class="text-black" style="font-family: Arial;font-size: 12px">Student Accommodation Division</h4>
        <hr class="bg-success">
        <p class="text-dark" style="font-family: Arial;font-size: 10px">The Accommodaton Division is a part of the University of Peradeniya. It provides a comprehensive service to all the students of the University by administering and allocating 19 hostels in the University, with the aim of supporting the student experience by providing efficient and effective accommodation services and facilities.
            Providing residential facilities for Undergraduate Students and recovering hostel fees and fines for damages from accommodated students are the main responsibilities of this division within the University of Peradeniya.
        </p>
<!--        <h4 class="text-black mt-3" style="font-family: Arial;font-size: 12px">Our objective is to support students in the following ways:</h4><hr class="bg-success">-->
<!--        <p class="text-dark" style="font-family: Arial;font-size: 10px">-->
<!--            1. By providing accurate information and advice regarding the accommodation application/allocation process <br>-->
<!--            2.By recognizing applicants as individuals with their own requirements at all times.               (Ex. Disability students)<br>-->
<!--            3.By allocating students into halls with the aim of providing balanced effective communities<br>-->
<!--            4.By providing hostel facilities for low income family members  where appropriate<br>-->
<!--            5.Efficiently and effectively respond to student issues and concerns<br>-->
<!--            6.Liaise/mediate/co-ordinate with other University departments to provide optimum support to residents.<br>-->
<!--            7.By Seeking  students’ opinion, analyze trends and recommend developments to the facilities and services provided to students.<br>-->
<!--            8.By supervising and helping to maintain  the standards of food hygiene and sanitary services provided at the  halls of residence.</p>-->
        <h4 class="text-black mt-3" style="font-family: Arial;font-size: 12px">Our Student Accommodation Policy:</h4>
        <hr class="bg-success">
        <p class="text-dark" style="font-family: Arial;font-size: 10px">University hostel facilities are provided on the basis of distance from the residence of the Students. Accordingly.<br>
            For 1st year students                             -over 50km<br>
            For 2nd year students                            - over 40km<br>
            On the basis of vacancies existing  in the  halls during the academic year.<br>

            For 3rd year students                            - Over 30km<br>
            For 4th year students                            - Over 20km<br>
            For 5th year students                            - All students<br>
            And

            We Also provide residential facilities for Captains and Vice Captains of Sports Teams.<br>
            Differently abled students.<br>
            On medical grounds if recommended by the University Chief Medical Officer.<br>
            Students who are facing dire financial difficulties, On the recommendations of the GS and AGA , Director Student Accommodation, Vice Chancellor or Deputy Vice Chancellor.<br>
            The University of Peradeniya aims to provide residential facilities to all its undergraduate students in the future. Unfortunately at this moment,  it is limited to about 65% of the student population.There are nineteen halls of residence in the University
        </p>
        <hr>
        <p>**If you are think you are eligible to residential facilities. Please submit your online apllication <strong>Click the Below Button</strong></p>
        <input type="submit" value="Send Your Details" id="login-btn" class="btn btn-outline-danger btn-md">
        <hr>
        <p>Send late pass request<strong>Click the Below Button</strong></p>
        <input type="submit" value="Send late Pass" id="latePass-btn" class="btn btn-outline-dark btn-md">
    </div>
</div>

</section>

<section id="registration-box" class="mt-3" style="display: none;height: 85vh">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
        <div class="card" id="viewDetails">
            <div class="card-header bg-primary d-flex">

                <h5 class="text-light" style="text-align: center">Click edit button to edit details</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive" id="showNote">
                    <p class="text-center lead mt-4">Please wait</p>

                </div>
            </div>
        </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
    <div class="row mt-3 ml-4">
        <div class="col-lg-3">
            <button class="ui toggle button bg-danger active ml-1" id="read-again">Read Again</button>
        </div>
        <div class="col-lg-6  ">
            <form class="ui form my-5 bg-success p-4 border border-primary" id="add-note-form" >
                <div id="add-details-alert"></div>
                <div class="field">
                    <div class="two fields">
                        <div class="field">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Full Name">
                        </div>
                        <div class="field">
                            <label>Address</label>
                            <input type="text" name="address" placeholder="Address" >
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="two fields">
                        <div class="field">
                            <label>Registration Number</label>
                            <input type="text" name="regnum"  placeholder="Registration Number">
                        </div>
                        <div class="field">
                            <label>Date of Birth</label>
                            <input type="text" name="dob" placeholder="Date of Birth">
                        </div>
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label>Faculty</label>
                        <select class="ui fluid dropdown" type="text" name="fac" >
                            <option value="Faculty of Arts">Faculty of Arts</option>
                            <option value="Faculty of Allied Health Sciences">Faculty of Allied Health Sciences</option>
                            <option value="Faculty of Agriculture">Faculty of Agriculture</option>
                            <option value="Faculty of Dental sciences">Faculty of Dental sciences</option>
                            <option value="Faculty of Engineering">Faculty of Engineering</option>
                            <option value="Faculty of Medicine">Faculty of Medicine</option>
                            <option value="Faculty of Management">Faculty of Management</option>
                            <option value="Faculty of Science">Faculty of Science</option>
                            <option value="Faculty of Veterinary Medicine">Faculty of Veterinary Medicine</option>
                        </select>
                    </div>
                    <div class="field">
                        <label>Current Academic Year</label>
                        <select class="ui fluid dropdown"  type="text" name="yea" id="year">
                            <option value="">Year</option>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                            <option value="5th Year">5th Year</option>
                        </select>
                    </div>
                </div>
                <div class="field">

                    <div class="two fields">
                        <div class="field">
                            <label>Course</label>
                            <input type="text"  name="course" placeholder="Course">
                        </div>

                        <div class="field">
                            <label>NIC</label>
                            <input type="text" name="NIC"  placeholder="NIC Number">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>Phone Number</label>
                    <input type="text"  name="phone" placeholder="Phone Number">
                </div>
                <div class="two fields">
                    <div class="field">
                        <label class="text-white">Choose image</label>
                        <input type="file" name="image" class="custom-file" >
                    </div>
                    <div class="field">
                        <label class="text-white">Gender</label>
                        <select class="ui fluid dropdown"  type="text" name="gender">
                            <option value="">Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                <input class="ui button" type="submit" id="addNoteBtn" value="Submit"></input>
            </form>
        </div>
    </div>
    </div>


    <!-- Modal -->
    <div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="ui form my-5 bg-success p-4 border border-primary" id="edit-note-form" method="post" >
                                <input type="hidden" name="id" id="id">
                                <div class="field">
                                    <div class="two fields">
                                        <div class="field">
                                            <label>Name</label>
                                            <input type="text" name="title" id="title"  placeholder="Full Name">
                                        </div>
                                        <div class="field">
                                            <label>Address</label>
                                            <input type="text" name="note"  id="note" placeholder="Address" >
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="two fields">
                                        <div class="field">
                                            <label>Registration Number</label>
                                            <input type="text" name="regnum"  id="regnum"  placeholder="Registration Number">
                                        </div>
                                        <div class="field">
                                            <label>Date of Birth</label>
                                            <input type="text" name="dob" id="dob" placeholder="Date of Birth">
                                        </div>
                                    </div>
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label>Faculty</label>
                                        <select class="ui fluid dropdown" type="text" name="fac"  id="fac">
                                            <option value="Faculty of Arts">Faculty of Arts</option>
                                            <option value="Faculty of Allied Health Sciences">Faculty of Allied Health Sciences</option>
                                            <option value="Faculty of Agriculture">Faculty of Agriculture</option>
                                            <option value="Faculty of Dental sciences">Faculty of Dental sciences</option>
                                            <option value="Faculty of Engineering">Faculty of Engineering</option>
                                            <option value="Faculty of Medicine">Faculty of Medicine</option>
                                            <option value="Faculty of Management">Faculty of Management</option>
                                            <option value="Faculty of Science">Faculty of Science</option>
                                            <option value="Faculty of Veterinary Medicine">Faculty of Veterinary Medicine</option>
                                        </select>
                                    </div>
                                    <div class="field">
                                        <label>Current Academic Year</label>
                                        <select class="ui fluid dropdown"  type="text" name="yea" id="year">
                                            <option value="">Year</option>
                                            <option value="1st Year">1st Year</option>
                                            <option value="2nd Year">2nd Year</option>
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                            <option value="5th Year">5th Year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="field">

                                    <div class="two fields">
                                        <div class="field">
                                            <label>Course</label>
                                            <input type="text"  name="course" id="course" placeholder="Course">
                                        </div>

                                        <div class="field">
                                            <label>NIC</label>
                                            <input type="text" name="NIC" id="NIC" placeholder="NIC Number">
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Phone Number</label>
                                    <input type="text"  name="phone" id="phone" placeholder="Phone Number">
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label class="text-white">Choose image</label>
                                        <input type="file" name="image" id="image" class="custom-file" >
                                    </div>
                                    <div class="field">
                                        <label class="text-white">Gender</label>
                                        <select class="ui fluid dropdown" id="gender" type="text" name="gender">
                                            <option value="">Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <input class="ui button btn-info" type="submit" name="editNote" id="editNoteBtn" value="Update details"></input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<section id="latepass-box" style="display: none">
    <div class="row" >
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <form class="ui form my-5  p-4 border border-primary" id="add-latepass-form" >


                <div class="field">
                    <div class="two fields">
                        <div class="field">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Full Name">
                        </div>
                        <div class="field">
                            <label>Registration Number</label>
                            <input type="text" name="regno"  placeholder="Registration Number">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="two fields">
                        <div class="field">
                            <label>Leave Date</label>
                            <input type="text" name="leavedate"  placeholder="Leave Date">
                        </div>
                        <div class="field">
                            <label>Arrival date</label>
                            <input type="text" name="arrivaldate"  placeholder="Arrival date">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="two fields">
                        <div class="field">
                            <label>Leave time</label>
                            <input type="text" name="leavetime"  placeholder="Leave time">
                        </div>
                        <div class="field">
                            <label>Arrival time</label>
                            <input type="text" name="arrivaltime"  placeholder="Arrival time">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>Reason</label>

                    <textarea id="w3mission" type="text" name="reason" rows="4" cols="50">

                    </textarea>
                </div>

                    <input class="ui button" type="submit" id="addLatePassBtn" value="Add Late Pass"></input>
            </form>
        </div>
        </div>

</section>

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

        //click button after eligible
        $("#login-btn").click(function () {
           $("#registration-box").show();
           $("#restriction-box").hide();
        });
    //late pass button
            $("#latePass-btn").click(function () {
                $("#registration-box").hide();
                $("#restriction-box").hide();
                $("#latepass-box").show();

        });
        //read me again
        $("#read-again").click(function () {
            $("#restriction-box").show();
            $("#registration-box").hide();
        });


      //add new note
        $("#addNoteBtn").click(function (e) {
            if ($("#add-note-form")[0].checkValidity()){
                e.preventDefault();
            $("#addNoteBtn").val('please wait');
            $.ajax({
                url: 'assets/php/process.php',
                method : 'post',
                data: $("#add-note-form").serialize()+'&action=add_note',
                success:function (response) {
                    $("#addNoteBtn").val('Add Details');
                    $("#add-note-form").modal('hide');
                    swal.fire({
                        title : 'Your details added successfully,Check your details below and If any error please edit',
                        type : 'success'
                    });
                    if (response === 'add_note'){
                        window.location ='profile.php';
                    }else{}
                }
            });
            }

        });

        //add late pass
        $("#addLatePassBtn").click(function (e) {
            if ($("#add-latepass-form")[0].checkValidity()){
                e.preventDefault();
                $("#addLatePassBtn").val('Please wait');
                $.ajax({
                   url: 'assets/php/process.php',
                   method: 'post',
                   data: $("#add-latepass-form").serialize()+'&action=add_late_pass',
                   success:function (response) {
                       console.log(response);
                       $("#addLatePassBtn").val('Sent your late pass');
                       swal.fire({
                           title : 'Your late pass sent to the administration successfully',
                           type : 'success'
                       });
                       $("#add-latepass-form")[0].reset();
                       $("#add-latepass-form").from('hide');
                   }
                });
            }
        })
    //edit note of an user ajax request
        $("body").on("click", ".editBtn", function (e) {
            e.preventDefault();

            edit_id = $(this).attr('id');
            $.ajax({
                url: 'assets/php/process.php',
                method: 'post',
                data: {edit_id : edit_id},
                success:function (response) {
                    data = JSON.parse(response);
                    $("#id").val(data.id);
                    $("#title").val(data.name);
                    $("#note").val(data.address);
                    $("#regnum").val(data.registration_number);
                    $("#dob").val(data.DOB);
                    $("#faculty").val(data.faculty);
                    $("#year").val(data.year);
                    $("#course").val(data.course);
                    $("#NIC").val(data.nic);
                    $("#phone").val(data.phone);
                    $("#image").val(data.image);
                    $("#gender").val(data.gender);
                }
            });
        });
//update note of an user ajax request
        $("#editNoteBtn").click(function (e) {
           if ($("#edit-note-form")[0].checkValidity()){
               e.preventDefault();

               $.ajax({
                   url: 'assets/php/process.php',
                   method:'post',
                   data: $("#edit-note-form").serialize()+"&action=update_details",
                   success:function (response) {
                       Swal.fire({
                           title: 'Note updated successfully!',
                           type: 'success',
                       });
                       $("#edit-note-form")[0].reset();
                       $("#exampleModalLong").modal('hide');
                       displayDetails();
                   }
               });
           }
        });

        displayDetails();
        function  displayDetails() {
            $.ajax({
                url: 'assets/php/process.php',
                method: 'post',
                data: { action: 'display_details'},
                success:function (response) {
                    $('#showNote').html(response);
                    $("#add-note-form")[0].reset();
                }
            });
        }

    });
</script>

</body>
</html>

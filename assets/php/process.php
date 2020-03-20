
<?php
require_once 'session.php';
if (isset($_POST['action']) && $_POST['action'] == 'add_note'){
    $rname = $cuser->test_input($_POST['name']);
    $raddress = $cuser->test_input($_POST['address']);
    $reg_no=$cuser->test_input($_POST['regnum']);
    $dob=$cuser->test_input($_POST['dob']);
    $faculty=$cuser->test_input($_POST['fac']);
    $year=$cuser->test_input($_POST['yea']);
    $course=$cuser->test_input($_POST['course']);
    $nic=$cuser->test_input($_POST['NIC']);
    $phone=$cuser->test_input($_POST['phone']);
    $gender=$cuser->test_input($_POST['gender']);
    $image=$cuser->test_input($_FILES["photo"]['name']);

    $cuser->add_new_note($cid,$rname,$raddress,$reg_no,$dob,$faculty,$year,$course,$nic,$image,$phone,$gender);
}

if (isset($_POST['action']) && $_POST['action'] == 'display_details'){
    $output='';

    $notes = $cuser->get_details($cid);

    if ($notes){
        $output .='
          <table class="table" >
                <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">Reg_Num</th>
                    <th scope="col">Faculty</th>
                    <th scope="col">Course</th>
                    <th scope="col">Year</th>
                    <th scope="col">D.O.B</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Edit Details</th>
                </tr>
                </thead>
                <tbody>';
        foreach ($notes as $row){
            $output .= '
            
                <tr>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['registration_number'].'</td>
                    <td>'.$row['faculty'].'</td>
                    <td>.'.$row['course'].'.</td>
                    <td>.'.$row['year'].'.</td>
                    <td>.'.$row['DOB'].'.</td>
                    <td>.'.$row['gender'].'.</td>
                    <td>
                 
                        <a href="#" id="'.$row['id'].'" title="Edit note" class="text-success editBtn">
                            <i class="fas fa-edit fa-2x" data-toggle="modal" data-target="#exampleModalLong"></i></a>&nbsp;
                        </button>
                        </a>
                      
                    </td>
                </tr>';

        }
        $output .='
           </tbody>
            </table>
        ';
        echo $output;
    }
    else{
        echo '<h5>You have not entered data to the system , fill the below form to send details to us </h5>';
    }
}


if (isset($_POST['action']) && $_POST['action'] == 'display_latePass'){
    $output='';

    $latepass = $cuser->get_latepass($cid);

    if ($latepass){
        $output .='
          <table class="table bg-light" id="latepassTable">
                <thead class="bg-light">
                <tr class="bg-light">
                    <th scope="col">name</th>
                    <th scope="col">Reg_Num</th>
                    <th scope="col">Leave Date</th>
                    <th scope="col">Arrival date</th>
                    <th scope="col">Leave Time</th>
                    <th scope="col">Arrival Time</th>
                    <th scope="col">Reason</th>
                     <th scope="col">Action</th>
                  
                </tr>
                </thead>
                <tbody>';
        foreach ($latepass as $row){
            $output .= '
            
                <tr>
                    <td class="bg-light">'.$row['name'].'</td>
                    <td class="bg-light">'.$row['regno'].'</td>
                    <td class="bg-light">'.$row['leavedate'].'</td>
                    <td class="bg-light">'.$row['arrivaldate'].'</td>
                    <td class="bg-light">'.$row['leavetime'].'</td>
                    <td class="bg-light">'.$row['arrivaltime'].'.</td>
                    <td class="bg-light">'.$row['reason'].'</td>
                       <td class="bg-light">
                        <a href="#" id="'.$row['id'].'" title="Latepass" class="text-success latepassBtn">
                            <i class="fas fa-edit fa-2x" data-toggle="modal" data-target="#actionModal2"></i></a>&nbsp;
                        </button>
                        </a>
</td>
                </tr>';

        }
        $output .='
           </tbody>
            </table>
        ';
        echo $output;
    }
    else{
        echo '<h3>:(no data </h3>';
    }
}
//display notifications
if (isset($_POST['action']) && $_POST['action'] == 'displayLatePassNotification'){
    $output='';

    $displayLatePassNotification = $cuser->displayLatePassNotification($cid);

    if ($displayLatePassNotification){
        $output .='
       ';
        foreach ($displayLatePassNotification as $row){
            $output .= '
             <div class="ui icon message" id="a">
            <i class="fa fa-envelope fa-3x text-info"></i>&nbsp;&nbsp;
            <div class="content" id="displayLatePassNotification" >
                <h4>Your late pass request, requested at &nbsp; <span class="text-info">'.$row['created_at'].' </span> for leave  date &nbsp;<span class="text-info">'.$row['leavedate'].'</span> is

            &nbsp; <span class="text-info">'.$row['actions'].'</span></h4>        
            </div>
           <i class="far fa-window-close fa-2x" id="b"></i>
        </div>';

        }
        $output .='
        
        ';
        echo $output;
    }
    else{
        echo '<h3>:(no data </h3>';
    }
}
//handle room details

if (isset($_POST['action']) && $_POST['action'] == 'display_rooms'){
    $output = '';

    $rooms = $cuser->display_rooms($cid);

   if ($rooms){
    $output .='
    <table class="table bg-light" >
                <thead class="bg-light">
                <tr class="bg-light">
                    <th scope="col">Hall name</th>
                    <th scope="col">number</th>
                    <th scope="col">bulbs</th>
                    <th scope="col">tables</th>
                    <th scope="col">keys</th>
                    <th scope="col">beds</th>
                     <th scope="col">cupboards</th>
                    <th scope="col">racks</th>
                   <th scope="col">chairs</th>
              
                </tr>
                </thead>
                <tbody>';
       foreach ($rooms as $row){
           $output .= '
            
                <tr>
                    <td class="bg-light">'.$row['name'].'</td>
                    <td class="bg-light">'.$row['number'].'</td>
                    <td class="bg-light">'.$row['bulbs'].'</td>
                    <td class="bg-light">'.$row['tables'].'</td>
                    <td class="bg-light">'.$row['nkey'].'</td>
                    <td class="bg-light">'.$row['beds'].'</td>
                    <td class="bg-light">'.$row['cupboard'].'</td>
                    <td class="bg-light">'.$row['racks'].'</td>
                    <td class="bg-light">'.$row['chairs'].'</td>
             
                </tr>';

       }
       $output .='
           </tbody>
            </table>
        ';
       echo $output;
   }
   else{
       echo '<h3>:(no data </h3>';
   }

}
//display hall
if (isset($_POST['action']) && $_POST['action'] == 'display_hall') {
    $output = '';

    $hall = $cuser->display_hall($cid);

    if ($hall){
        $output .='
    <table class="table bg-light" >
                <thead class="bg-light">
                <tr class="bg-light">
                    <th scope="col">name</th>
                    <th scope="col">address</th>
                    <th scope="col">Number_Of_Rooms</th>
                    <th scope="col">Hall Type</th>
                </tr>
                </thead>
                <tbody>';
        foreach ($hall as $row){
            $output .= '
            
                <tr>
                    <td class="bg-light">'.$row['name'].'</td>
                    <td class="bg-light">'.$row['address'].'</td>
                     <td class="bg-light">'.$row['no_of_rooms'].'</td>
                    <td class="bg-light">'.$row['hostal_type'].'</td>
             
                </tr>';

        }
        $output .='
           </tbody>
            </table>
        ';
        echo $output;
    }
    else{
        echo '<h3>:no data </h3>';
    }

}

//handle edit details of user ajax request
if (isset($_POST['edit_id'])){
    $id= $_POST['edit_id'];

    $row=$cuser->edit_details($id);
    echo  json_encode($row);
}

// handle update note of an user ajax request
if (isset($_POST['action']) && $_POST['action'] == 'update_details'){
    $id = $cuser->test_input($_POST['id']);
    $name = $cuser->test_input($_POST['title']);//name value eka ganda
    $address = $cuser->test_input($_POST['note']);
    $registration_number = $cuser->test_input($_POST['regnum']);
    $dob = $cuser->test_input($_POST['dob']);
    $faculty= $cuser->test_input($_POST['fac']);
    $year = $cuser->test_input($_POST['yea']);
    $course = $cuser->test_input($_POST['course']);
    $nic= $cuser->test_input($_POST['NIC']);
    $phone = $cuser->test_input($_POST['phone']);
    $gender = $cuser->test_input($_POST['gender']);

    $cuser->update_details($id,$name,$address,$registration_number,$dob,$faculty,$year,$course,$phone,$gender);
}
//handle edit latepass
if (isset($_POST['edit_lp'])){
    $id = $_POST['edit_lp'];
    $row = $cuser->edit_latepass($id);
    echo  json_encode($row);
}
//update latepass request
if (isset($_POST['action']) && $_POST['action'] == 'update_latepass'){

    $id = $cuser->test_input($_POST['id']);
    $name = $cuser->test_input($_POST['name']);
    $actions = $cuser->test_input($_POST['actions']);


    $cuser->update_latepass($id,$name,$actions);
}

// handle add late pass
if (isset($_POST['action']) && $_POST['action'] == 'add_late_pass'){

    $name = $cuser->test_input($_POST['name']);
    $regno = $cuser->test_input($_POST['regno']);
    $leavedate=$cuser->test_input($_POST['leavedate']);
    $arrivaldate=$cuser->test_input($_POST['arrivaldate']);
    $leavetime=$cuser->test_input($_POST['leavetime']);
    $arrivaltime=$cuser->test_input($_POST['arrivaltime']);
    $reason=$cuser->test_input($_POST['reason']);

    $cuser->add_late_pass($cid,$name,$regno,$leavedate,$arrivaldate,$leavetime,$arrivaltime,$reason);
}

// add halls
if (isset($_POST['action']) && $_POST['action'] == 'add_hall'){
    $name = $cuser->test_input($_POST['name']);
    $address = $cuser->test_input($_POST['address']);
    $no_of_rooms= $cuser->test_input($_POST['rooms']);
    $type =  $cuser->test_input($_POST['type']);
    $cuser->add_hall($cid,$name,$address,$no_of_rooms,$type);
}

//room add
if (isset($_POST['action']) && $_POST['action'] == 'add_room'){
    $names = $cuser->test_input($_POST['names']);
    $number = $cuser->test_input($_POST['number']);
    $nkey = $cuser->test_input($_POST['nkey']);
    $bulbs = $cuser->test_input($_POST['bulbs']);
    $tables = $cuser->test_input($_POST['tables']);
    $beds = $cuser->test_input($_POST['beds']);
    $chairs =$cuser->test_input($_POST['chairs']);
    $cupboard =$cuser->test_input($_POST['cupboards']);
    $racks = $cuser->test_input($_POST['racks']);
    $beds = $cuser->test_input($_POST['beds']);
    $cuser->add_room($cid,$names,$number,$nkey,$bulbs,$tables,$chairs,$cupboard,$racks,$beds);
}


//handle change password
if (isset($_POST['action']) && $_POST['action'] == 'change_pass'){
   $currentPass = $_POST['curpass'];
   $newPass = $_POST['newpass'];
   $cnewpass = $_POST['cnewpass'];

   $hnewpass = password_hash($newPass , PASSWORD_DEFAULT);

   if($newPass != $cnewpass){
       echo $cuser->showMessage('danger', 'Password did not matching');
    }
   else{
        if (password_verify($currentPass, $cpass)){
            $cuser->change_password($hnewpass,$cid);
            echo $cuser->showMessage('success','Password changed successfully');
        }
        else{
            echo $cuser->showMessage('danger', 'current password is wrong');
        }
    }
}

//filter rooms
if (isset($_POST['action']) && $_POST['action'] == 'filterList'){
    $output = '';

    $filterList = $cuser->filterList($cid);

    if ($filterList){
        $output .='
   ';
        foreach ($filterList as $row){
            $output .= '
         
                   <li class="list-group-item">
                    <div class="form-check">
                        <label class="form-check-label" style="font-size: 12px">
                            <input type="checkbox" class="form-check-input" id="x"
                            value='.$row['name'].'><p>'.$row['name'].'</p>
                        </label>
                    </div>
                </li>';

        }
        $output .='
       
        ';
        echo $output;
    }
    else{
        echo '<h3>:no data </h3>';
    }
}
//filter
if (isset($_POST['action']) && $_POST['action'] == 'filter'){
    $output = '';

    $filter = $cuser->filter($cid);

    if ($filter){
        $output .='
<h4 class="text-center mt-3">James Peiris Hall Rooms Details</h4>
    <table class="table bg-light" >
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
              
                </tr>
                </thead>
                <tbody>';
        foreach ($filter as $row){
            $output .= '
            
                <tr>
                    <td class="bg-light">'.$row['name'].'</td>
                    <td class="bg-light">'.$row['number'].'</td>
                    <td class="bg-light">'.$row['bulbs'].'</td>
                    <td class="bg-light">'.$row['tables'].'</td>
                    <td class="bg-light">'.$row['nkey'].'</td>
                    <td class="bg-light">'.$row['beds'].'</td>
                    <td class="bg-light">'.$row['cupboard'].'</td>
                    <td class="bg-light">'.$row['racks'].'</td>
                    <td class="bg-light">'.$row['chairs'].'</td>
             
                </tr>';

        }
        $output .='
           </tbody>
            </table>
        ';
        echo $output;
    }
    else{
        echo '<h3>:(no data </h3>';
    }

}
//edit room
if (isset($_POST['edit_room'])){
    $id= $_POST['edit_room'];
    $row=$cuser->edit_room($id);
    echo  json_encode($row);
}
//update_rooms
if (isset($_POST['action']) && $_POST['action'] == 'update_rooms'){

    $id = $cuser->test_input($_POST['id']);
    $name = $cuser->test_input($_POST['name']);//name value eka ganda
    $number = $cuser->test_input($_POST['number']);
    $bulbs = $cuser->test_input($_POST['bulbs']);
    $tables = $cuser->test_input($_POST['tables']);
    $nkey = $cuser->test_input($_POST['nkey']);
    $beds = $cuser->test_input($_POST['beds']);
    $cupboard = $cuser->test_input($_POST['cupboard']);
    $racks = $cuser->test_input($_POST['racks']);
    $chairs = $cuser->test_input($_POST['chairs']);
    $student1 = $cuser->test_input($_POST['student1']);
    $student2 = $cuser->test_input($_POST['student2']);
    $student3 = $cuser->test_input($_POST['student3']);
    $student4 = $cuser->test_input($_POST['student4']);

    $cuser->update_rooms($id,$name,$number,$bulbs,$tables,$nkey,$beds,$cupboard,$racks,$chairs,$student1,$student2,$student3,$student4);
}
//edit hall
if (isset($_POST['edit_hall'])){
    $id= $_POST['edit_hall'];
    $row=$cuser->edit_hall($id);
    echo  json_encode($row);
}
//update_halls
if (isset($_POST['action']) && $_POST['action'] == 'update_halls'){
    $id = $cuser->test_input($_POST['id']);
    $name = $cuser->test_input($_POST['names']);//name value eka ganda
    $address = $cuser->test_input($_POST['address']);
    $rooms = $cuser->test_input($_POST['no_of_rooms']);
    $type = $cuser->test_input($_POST['hostal_type']);

    $cuser->update_halls($id,$name,$address,$rooms,$type);
}
//fillRoom
if (isset($_POST['action']) && $_POST['action'] == 'fillRoom'){

    $id = $cuser->test_input($_POST['id']);
    $name = $cuser->test_input($_POST['name']);//name value eka ganda

    $cuser->fillRoom($id,$name);
}

?>



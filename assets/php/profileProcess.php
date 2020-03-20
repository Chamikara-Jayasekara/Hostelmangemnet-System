<?php
require_once 'session.php';

  //display user details
    if (isset($_POST['action']) && $_POST['action'] == 'display_student_details'){
        $output = '';
        $details = $cuser->get_details($cid);

    }

    if ($details){
        $output .= '
   
        ';

            foreach ($details as $row){
            $output .= '  
  
      <div class="row " id="a">
             <div class="col-lg-1"></div>
                <div class="col-lg-11  mt-3">
                    <h5 class="text-white mt-2">Your Personal details</h5>
                   
                    <hr class="bg-white" >
                
                <div class="row mb-2" >
                    <div class="col-lg-4" ">
                        <img src="uploads/wisdom.jpeg" alt="" class="center" style="height: 200px;border: 5px solid #0c5460; display: block;margin-left: auto;margin-right: auto;width: 70%;height: 200px">
                    </div>
                    <div class="col-lg-4 border-left"> 
                    
                    <div class="ml-3  mb-2" style="height: 70px">
                    <div class="row" style="height: 50px">
                    <div class="col-lg-2 bg-info"><i class="fas fa-user fa-3x ml-1 mt-2"></i></div>
                    <div class="col-lg-10"> <h3 class="mt-2">' .$row['name'].'</h3></div>
                    </div>
                    </div>
                       <div class="ml-3  mb-2" style="height: 70px">
                    <div class="row" style="height: 50px">
                    <div class="col-lg-2 bg-info"><i class="fas fa-address-book fa-3x ml-1 mt-2"></i></div>
                    <div class="col-lg-10"> <h3 class="mt-2">' .$row['registration_number'].'</h3></div>
                    </div>
                 </div>
                  <div class="ml-3  mb-2" style="height: 70px">
                    <div class="row" style="height: 50px">
                    <div class="col-lg-2 bg-info"><i class="fas fa-university fa-3x ml-1 mt-2"></i></div>
                    <div class="col-lg-10"> <h3 class="mt-2">' .$row['faculty'].'</h3></div>
                    </div>
                 </div>
                  <div class="ml-3  mb-2" style="height: 70px">
                    <div class="row" style="height: 50px">
                    <div class="col-lg-2 bg-info"><i class="fas fa-graduation-cap fa-3x ml-1 mt-2"></i></div>
                    <div class="col-lg-10"><h3 class="mt-2">' .$row['course'].'</h3></div>
                    </div>
                 </div>
                 </div>
               
                
                <div class="col-lg-4 border-left ">
                        
                  <div class="ml-3  mb-2" style="height: 70px">
                    <div class="row" style="height: 50px">
                    <div class="col-lg-2 bg-info"><i class="fas fa-calendar-alt fa-3x ml-1 mt-2"></i></div>
                    <div class="col-lg-10"> <h3 class="mt-2">' .$row['year'].'</h3></div>
                    </div>
                 </div>
                 <div class="ml-3 mb-2 " style="height: 70px">
                    <div class="row" style="height: 50px">
                    <div class="col-lg-2 bg-info"><i class="fas fa-home fa-3x ml-1 mt-2"></i></div>
                    <div class="col-lg-10"> <h3 class="mt-2">' .$row['address'].'</h3></div>
                    </div>
                 </div>
                   <div class="ml-3 mb-2 " style="height: 70px">
                    <div class="row" style="height: 50px">
                    <div class="col-lg-2 bg-info"><i class="fas fa-calendar-day fa-3x ml-1 mt-2"></i></div>
                    <div class="col-lg-10"> <h3 class="mt-2">' .$row['DOB'].'</h3></div>
                    </div>
                 </div>
            </div>
      </div>
      
      </div> 
    </div>
    
         ';
            }
            $output .= '';
           echo $output; 

    }else{
        echo '<h3>No data</h3>';

}



?>








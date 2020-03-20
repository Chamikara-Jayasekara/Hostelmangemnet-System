<?php
require_once 'config.php';
class auth extends  Database{
     //Register new user
    public function  register($name,$email,$password){
        $sql="INSERT INTO users(name,email,password) VALUES (:name,:email,:pass)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name'=>$name, 'email'=>$email, 'pass'=>$password]);
        return true;
    }


    //check if user already registered
    public function user_exist($email){
        $sql = "SELECT email From users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    //login existing user
    public function login($email){
        $sql ="SELECT email,password FROM users WHERE email = :email AND deleted !=0";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $row =$stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    //current user in session
    public function currentUser($email){
        $sql ="SELECT * FROM users WHERE email = :email AND deleted != 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    //

    //forgot password
    public function forgot_password($token,$email){
        $sql ="UPDATE users SET token = :token, token_expire = DATE_ADD(NOW(),INTERVAL 10 MINUTE)
        WHERE email= :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['token'=>$token,'email'=>$email]);
        return true;
    }
    //reset password user auth
    public function reset_pass_auth($email,$token){
        $sql = "SELECT id FROM users WHERE email = :email AND token = :token AND 
            token != '' AND token_expire > NOW() AND deleted != 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email,'token'=>$token]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }


    public function send_notification($email,$action){
        $sql = "SELECT actions FROM latepass ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email,'actions'=>$action]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    //Update New Password
    public function update_new_pass($pass,$email){
        $sql = "UPDATE users SET token = '' , password= :pass WHERE email=:email AND deleted != 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['pass'=>$pass,'email'=>$email]);
        return true;
    }

    //add new student details
    public function add_new_note($uid,$rname,$raddress,$regno,$dob,$faculty,$year,$course,$nic,$image,$phone,$gender){

           $sql = "INSERT INTO student(userid,	name,address,registration_number,DOB,faculty,year,course,nic,image,phone,gender) VALUES (:uid,:title,:note,:regnum,:dob,:fac,:yea,:Course,:NIC,:photo,:phone,:gender)";
           $stmt = $this->conn->prepare($sql);
           $stmt->execute(['uid'=>$uid,'title'=>$rname,'note'=>$raddress, 'regnum'=>$regno, 'dob'=>$dob, 'fac'=>$faculty,'yea'=>$year,'Course'=>$course,'NIC'=>$nic,'photo'=>$image,'phone'=>$phone,'gender'=>$gender]);
           return true;


    }
    //add late pass
    public function add_late_pass($userid,$name, $regno,$leavedate,$arrivaldate,$leavetime,$arrivaltime,$reason){
        $sql ="INSERT INTO  latepass(userid, name, regno,leavedate,arrivaldate,leavetime,arrivaltime,reason) VALUES (:uid, :name , :regno ,:leavedate,:arrivaldate,:leavetime,:arrivaltime,:reason)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['uid'=>$userid,'name'=>$name,'regno'=>$regno,'leavedate'=>$leavedate,'arrivaldate'=>$arrivaldate,'leavetime'=>$leavetime,'arrivaltime'=>$arrivaltime,'reason'=>$reason]);
        return true;
    }
//add hostal
public function add_hall($userid,$name,$address,$no_of_rooms,$type){
        $sql = "INSERT INTO hall(userid, name, address, no_of_rooms,hostal_type) VALUES (:uid , :name, :address, :no_of_rooms, :hostal_type)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['uid'=>$userid,'name'=>$name,'address'=>$address,'no_of_rooms'=>$no_of_rooms,'hostal_type'=>$type]);
        return true;
}
//add room
public function add_room($userid,$names,$number,$nkey,$bulbs,$tables,$chairs,$cupboard,$racks,$beds){
    $sql = "INSERT INTO room1 (userid, name, number, nkey, bulbs, tables, chairs, cupboard, racks, beds) VALUES (:uid , :names, :number, :nkey, :bulbs, :tables, :chairs, :cupboard, :racks, :beds)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['uid'=>$userid,'names'=>$names,'number'=>$number, 'nkey'=>$nkey, 'bulbs'=>$bulbs, 'tables'=>$tables,'chairs'=>$chairs, 'cupboard'=>$cupboard, 'racks'=>$racks, 'beds'=>$beds]);
    return true;
}

    //display the enterd details of the student
    public function get_details($uid){
        $sql = "SELECT * FROM student WHERE userid = :uid LIMIT 1";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute(['uid'=>$uid]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
//display late pass
    public function get_latepass($id){
        $sql = "SELECT * FROM latepass WHERE  DATE(created_at) = CURDATE(); ";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    //display notification of latepass requests
    public function displayLatePassNotification($id){
        $sql = "SELECT * FROM latepass WHERE  DATE(created_at) = CURDATE(); ";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    //display halls
    public function get_halls($id){
        $sql = "SELECT * FROM hall";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    //edit details of an user
    public function edit_details($id){
        $sql= "SELECT * FROM student WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }




    public function update_details($id,$name,$address,$registration_number,$dob,$faculty,$year,$course,$phone,$gender){
        $sql="UPDATE student SET name = :title , address = :note , registration_number = :regnum, DOB = :dob , faculty = :fac, year = :yea, 	course = :course, phone = :phone, gender = :gender,  updated_at = NOW() WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['title'=>$name,'id'=>$id,'note'=>$address,'regnum'=>$registration_number,'dob'=>$dob, 'fac'=>$faculty, 'yea'=>$year,'course'=>$course, 'phone'=>$phone,'gender'=>$gender]);
        return true;
    }
//edit latepass
    public function edit_latepass($id){
        $sql= "SELECT * FROM latepass WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


//update latepass
    public function update_latepass($id,$name,$actions){
        $sql="UPDATE latepass SET name= :name, actions = :actions, updated_at = NOW() WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name'=>$name,'actions'=>$actions,'id'=>$id]);
        return true;
    }

//edit rooms
    public function edit_room($id){
        $sql= "SELECT * FROM room1 WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    //update_rooms
    public function update_rooms($id,$name,$number,$bulbs,$tables,$nkey,$beds,$cupboard,$racks,$chairs,$student1,$student2,$student3,$student4){
        $sql="UPDATE room1 SET name = :name, number = :number, bulbs = :bulbs, tables = :tables, nkey = :nkey, beds = :beds, cupboard = :cupboard, racks = :racks, chairs = :chairs, student1 = :student1, student2 = :student2, student3 = :student3, student4 = :student4, updated_at = NOW() WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name'=>$name,'number'=>$number,'bulbs'=>$bulbs,'tables'=>$tables, 'nkey'=>$nkey , 'beds'=>$beds , 'cupboard'=>$cupboard,'racks'=>$racks ,'chairs'=>$chairs, 'student1'=>$student1, 'student2'=>$student2,'student3'=>$student3,'student4'=>$student4,'id'=>$id]);
        return true;
    }
    //edit_hall
    public function edit_hall($id){
        $sql= "SELECT * FROM hall WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    //update_halls
    public function update_halls($id,$name,$address,$rooms,$type){
        $sql="UPDATE hall SET name = :name,  address =:address, no_of_rooms = :no_of_rooms, hostal_type = :hostal_type, updated_at = NOW() WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name'=>$name,'id'=>$id,'address'=>$address,'no_of_rooms'=>$rooms,'hostal_type'=>$type]);
        return true;
    }
    //change password of user
      public function change_password($pass,$id){
        $sql = "UPDATE users SET password = :pass WHERE id = :id AND deleted ! =0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['pass'=>$pass,'id'=>$id]);
        return true;
    }
    //adminlogin existing user
    public function adminlogin($email){
        $sql ="SELECT email,password FROM users WHERE email = :email AND deleted !=0";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $row =$stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    //fetch room details
    public function display_rooms($id){
        $sql = "SELECT * FROM room1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //display hall
    public function display_hall($id){
        $sql = "SELECT * FROM hall ORDER BY name ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    //filter rooms
    public function filterList($id){
        $sql = "SELECT DISTINCT name FROM room1 ORDER BY name";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function filterRooms($id){
        $sql = "SELECT * FROM room1 WHERE name='James Peris Hall'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function filter($id){
        $sql = "SELECT * FROM room1 WHERE name='James Peris Hall'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

//SELECT COUNT(id) FROM room1 WHERE name='James Peris Hall'

    //arunchalam rooms display
//    public function ArunachalamRooms($id){
//        $sql = "SELECT * FROM rooms WHERE name='Arunachalam Hall'";
//        $stmt = $this->conn->prepare($sql);
//        $stmt->execute(['id'=>$id]);
//
//        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        return $result;
//    }
//    //jp rooms display
//    public function JPRooms($id){
//        $sql = "SELECT * FROM rooms WHERE name='James Peris Hall'";
//        $stmt = $this->conn->prepare($sql);
//        $stmt->execute(['id'=>$id]);
//
//        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        return $result;
//    }
}

?>


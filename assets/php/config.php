<?php
class Database{

    const USERNAME = 'hostalmanagementsystemuop@gmail.com';
    const  PASSWORD= 'hms12345@gmail.com';

    private  $dsn = "mysql:host=localhost;dbname=db_user_system";
    private $dbuser ="root";
    private  $dbpass= "";

    public $conn;
    public function __construct(){
        try{
            $this->conn= new PDO($this->dsn,$this->dbuser,$this->dbpass);

        }catch (PDOException $e){
            echo 'Eror:'.$e->getMessage();
        }
        return $this->conn;

    }
    //checking input
    public function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }
    //eror success message alert
    public function showMessage($type,$message){
        return ' <div class="alert alert-'.$type.' alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong class="text-center">'.$message.'</strong>
        </div>';
    }
}

//$ob = new Database();

?>

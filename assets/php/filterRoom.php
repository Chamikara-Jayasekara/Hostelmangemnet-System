<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/sp-1.0.1/datatables.min.css"/>
<?php

$conn = new mysqli("localhost","root","","db_user_system");

if ($conn->connect_error){
    die("Could not connect to database!".$conn->connect_error);
}

if(isset($_POST['action'])){
    $sql = "SELECT * FROM room1 WHERE name !=''";
    if(isset($_POST['name'])){
        $name = implode("','", $_POST['name']);
        $sql.="AND name IN('".$name."')";
    }
    if(isset($_POST['number'])){
        $number = implode("','", $_POST['number']);
        $sql.="AND number IN('".$number."')";
    }
    if(isset($_POST['bulbs'])){
        $bulbs = implode("','", $_POST['bulbs']);
        $sql.="AND bulbs IN('".$bulbs."')";
    }
    if(isset($_POST['tables'])){
        $tables = implode("','", $_POST['tables']);
        $sql.="AND tables IN('".$tables."')";
    }

    if(isset($_POST['nkey'])){
        $nkey = implode("','", $_POST['nkey']);
        $sql.="AND nkey IN('".$nkey."')";
    }
    if(isset($_POST['beds'])){
        $beds = implode("','", $_POST['beds']);
        $sql.="AND beds IN('".$beds."')";
    }
    if(isset($_POST['cupboard'])){
        $cupboard = implode("','", $_POST['cupboard']);
        $sql.="AND cupboard IN('".$cupboard."')";
    }
    if(isset($_POST['racks'])){
        $racks = implode("','", $_POST['racks']);
        $sql.="AND racks IN('".$racks."')";
    }
    if(isset($_POST['chairs'])){
        $chairs = implode("','", $_POST['chairs']);
        $sql.="AND chairs IN('".$chairs."')";
    }

    $result = $conn->query($sql);
    $output='
      <table class="table bg-light" id="myTable"  style="width: 80vw" >
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
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
    
    ';
    if($result->num_rows>0){

        while($row=$result->fetch_assoc()){
            $output .='
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
                       <td class="bg-light"><a href="" id="'.$row['id'].'" title="edit" class="text-info editRoomBtn">
                       <i class="fas fa-edit fa-2x" data-toggle="modal" data-target="#actionModal"></i>
                       </a>
                       
                       </td> 
                       </tr>
                   
              
                    ';
        }
    }

    else{
        $output ="<h3>Sorry Dear No Products can Found According to your Seletion!</h3>";
    }
    echo $output;

}

?>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/sp-1.0.1/datatables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>

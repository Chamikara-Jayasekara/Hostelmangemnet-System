
<?php
$conn = new mysqli("localhost","root","","db_user_system");

if ($conn->connect_error){
    die("Could not connect to database!".$conn->connect_error);
}
$output='';
if(isset($_POST['query'])){
    $search=$_POST['query'];
    $stmt=$conn->prepare("SELECT * FROM rooms WHERE name LIKE CONCAT('%',?,'%') OR number LIKE CONCAT('%',?,'%')");
    $stmt->bind_param("ss",$search,$search);
}
else{
    $stmt=$conn->prepare("Select * FROM rooms");
}
$stmt->execute();
$result=$stmt->get_result();

if($result->num_rows>0){
    $output="  <thead>
                    <tr><th>Hall Name</th>
                        <th>Room Number</th>
                        <th>Keys</th>
                        <th>Bulbs</th>
                        <th>Tables</th>
                        <th>Beds</th>
                        <th>Cupboards</th>
                        <th>Chairs</th>
                        <th>Racks</th> 
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>";
    while ($row=$result->fetch_assoc()){
        $output .="
                 <tr>
                        <td>".$row['name']."</td>
                        <td >".$row['number']."</td>
                        <td>".$row['nkey']."</td>
                        <td>.".$row['bulbs']."</td>
                        <td>".$row['tables']."</td>
                        <td>".$row['beds']."</td>
                        <td >".$row['cupboard']."</td>
                        <td>".$row['chairs']."</td>
                        <td>.".$row['racks']."</td>
                        <td class='bg-light'>
                        <a href='#' id=".$row['id']." title='Latepass' class='text-info serachactionBtn'>
                        <i class='fas fa-edit fa-2x' data-toggle='modal' data-target='#actionModal'></i>
</a>
</td>
                        
                    </tr>";
    }
    $output .="</tbody>";
    echo $output;
}
else{
    echo "<h3>No records found!</h3>";
}
?>


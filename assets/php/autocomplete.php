<?php
$conn = new mysqli("localhost","root","","db_user_system");

if ($conn->connect_error){
    die("Could not connect to database!".$conn->connect_error);
}

if (isset($_POST['query'])){
  $inpText=$_POST['query'];
  $query ="SELECT name FROM rooms WHERE name LIKE '%$inpText%'";
  $result = $conn->query($query);
  if ($result->num_rows>0){
      while ($row=$result->fetch_assoc()){
          echo "<a href='#' class='list-group-item list-group-action border-1 bg-light'>".$row['name']."</a>";
      }
  }
  else{
      echo "<p>No records found</p>";
  }
}
?>

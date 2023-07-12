<?php
include "config.php";
$sid = $_GET["id"];

$query = "SELECT * FROM students WHERE id = '$sid'";
$data = mysqli_query($conn,$query);
$output = [];
if (mysqli_num_rows($data) > 0) {
    while ($row = mysqli_fetch_assoc($data)) {    
        $output['text'][] = $row; 
    }
}


$query1 = "SELECT * FROM classes";
$data1 = mysqli_query($conn,$query1);
if (mysqli_num_rows($data1) > 0) {
    while ($row1 = mysqli_fetch_assoc($data1)) {    
        $output['classes'][] = $row1; 
    }
}
echo json_encode($output);


?>
<?php
include "config.php";


$input = file_get_contentS('PHP://INPUT');
$decode = json_decode($input,true);
$Id = $decode["Id"];
$f_name = $decode["Fname"];
$l_name = $decode["Lname"];
$options = $decode["Options"];
$city = $decode["City"];

$query = "UPDATE students SET fname='$f_name', lname='$l_name', class_id='$options', city='$city' WHERE id = '$Id'";
$data = mysqli_query($conn ,$query);

if ($data) {
    echo json_encode(["insert" => "success"]);
}else{
    echo json_encode(["insert" => "Failed"]);
}

?>
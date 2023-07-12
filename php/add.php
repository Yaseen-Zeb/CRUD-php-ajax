<?php
include "config.php";
$inpt = file_get_contents('php://input');
$decode = json_decode($inpt,true);

$f_name = $decode["Fname"];
$l_name = $decode["Lname"];
$options = $decode["Options"];
$city = $decode["City"];

$query = "INSERT INTO students(fname,lname,class_id,city)
                      VALUES ('{$f_name}','{$l_name}','$options}','{$city}')";
$data = mysqli_query($conn ,$query);


if ($data) {
    echo json_encode(["insert" => "success"]);
}else{
    echo json_encode(["insert" => "Failed"]);
}


?>
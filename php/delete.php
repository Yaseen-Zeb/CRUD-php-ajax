<?php
include "config.php";
$sid = $_GET["id"];

$query = "DELETE FROM students WHERE id = $sid";
$data = mysqli_query($conn,$query);


mysqli_close($conn);
if ($data) {
   echo json_encode(["delete" => "success"]);
}else{
   echo json_encode(["delete" => "fail"]);
}

?>
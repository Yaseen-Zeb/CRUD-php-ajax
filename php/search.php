<?php
include "config.php";
$search = $_GET["search"];
$query = "SELECT students.*,classes.id as cid,classes.cname FROM students INNER JOIN classes on students.class_id = classes.id WHERE concat(fname,lname)  LIKE '%$search%'";
$data = mysqli_query($conn,$query);
$arr =[];
if (mysqli_num_rows($data) > 0) {
    while ($row = mysqli_fetch_assoc($data)) {
        $arr[] = $row;
    }  
    echo json_encode($arr);
}else{
   echo json_encode(["status" => "false"]);
}
mysqli_close($conn);
?>
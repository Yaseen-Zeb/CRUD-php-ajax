<?php
include "config.php";
$query = "SELECT students.*,classes.id as cid,classes.cname FROM students INNER JOIN classes on students.class_id = classes.id ORDER BY students.id";
$data = mysqli_query($conn,$query);
$output = [];
if (mysqli_num_rows($data) > 0) {
    while ($row = mysqli_fetch_assoc($data)) {    
        $output[] = $row; 
    }
}else {
        $output["empty"] = ["empty"];
    }

mysqli_close($conn);
echo json_encode($output);

?>
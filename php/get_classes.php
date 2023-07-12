<?php
include "config.php";
$query = "SELECT * FROM classes";
$data = mysqli_query($conn ,$query);
$output = [];
if (mysqli_num_rows($data) > 0) {
    while ($row = mysqli_fetch_assoc($data)) {
        $output[] = $row;
    }
}
echo json_encode($output);


?>
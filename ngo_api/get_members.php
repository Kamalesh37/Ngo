<?php
header("Access-Control-Allow-Origin: *");
include "../includes/db.php";

$result = mysqli_query($conn, "SELECT * FROM members");

$data = [
  "governing" => [],
  "exec" => [],
  "state" => []
];

while($row = mysqli_fetch_assoc($result)){
    $row['image'] = "http://localhost/NGO-CMS/uploads/" . $row['image'];

    if($row['category'] == 'governing') $data['governing'][] = $row;
    if($row['category'] == 'exec') $data['exec'][] = $row;
    if($row['category'] == 'state') $data['state'][] = $row;
}

echo json_encode($data);
?>
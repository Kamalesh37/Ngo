<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include "../includes/db.php";

$sql = "SELECT * FROM impact_stories ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

$stories = [];

while ($row = mysqli_fetch_assoc($result)) {
    // Fix image path for Angular
    $row['image'] = "http://localhost/NGO-CMS/uploads/" . $row['image'];
    $stories[] = $row;
}

echo json_encode($stories);
?>
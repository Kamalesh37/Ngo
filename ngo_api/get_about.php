<?php
header("Access-Control-Allow-Origin: *");
include "../includes/db.php";

$data = [];

// About
$res1 = mysqli_query($conn, "SELECT * FROM about_content LIMIT 1");
$data['about'] = mysqli_fetch_assoc($res1);

// Stats
$res2 = mysqli_query($conn, "SELECT * FROM about_stats");
$stats = [];
while($row = mysqli_fetch_assoc($res2)){
    $stats[] = $row;
}
$data['stats'] = $stats;

echo json_encode($data);
?>
<?php
header("Access-Control-Allow-Origin: *");
include "../includes/db.php";

$result = mysqli_query($conn, "SELECT * FROM news ORDER BY date DESC");

$news = [];

while($row = mysqli_fetch_assoc($result)){
    $row['image'] = "http://localhost/NGO-CMS/uploads/" . $row['image'];
    $news[] = $row;
}

echo json_encode($news);
?>
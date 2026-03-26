<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include "../includes/db.php";

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM impact_stories WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$story = $result->fetch_assoc();

if ($story) {
    $story['image'] = "http://localhost/NGO-CMS/uploads/" . $story['image'];
}

echo json_encode($story);
?>
<?php
session_start();

if(!isset($_SESSION['admin'])){
header("Location: login.php");
exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>NGO CMS Admin</title>

<link rel="stylesheet" href="../css/style.css">

<script src="https://cdn.tiny.cloud/1/qyoliswa5ylnsdaimueb0geux44fi0moxaacfp2qhllmpodk/tinymce/8/tinymce.min.js"></script>

<script>
tinymce.init({
selector:'textarea',
height:300
});
</script>

</head>

<body>

<div class="header">

<h2>NGO CMS Admin</h2>

<div class="profile">

<img src="../uploads/profile.png" onclick="toggleProfile()">

<div class="profile-menu" id="profileMenu">

<a href="profile.php">My Profile</a>
<a href="logout.php">Logout</a>

</div>

</div>

</div>
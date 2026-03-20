<?php
session_start();
include("../includes/db.php");

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM admins WHERE username=?");
$stmt->bind_param("s",$username);
$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows > 0){

$row = $result->fetch_assoc();
$db_password = $row['password'];

if(password_verify($password,$db_password)){

$_SESSION['admin']=$username;
header("Location: dashboard.php");
exit();

}

if($password === $db_password){

$new_hash = password_hash($password,PASSWORD_DEFAULT);

$update = $conn->prepare("UPDATE admins SET password=? WHERE id=?");
$update->bind_param("si",$new_hash,$row['id']);
$update->execute();

$_SESSION['admin']=$username;
header("Location: dashboard.php");
exit();

}

echo "Invalid Login";

}else{

echo "User not found";

}

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
</head>

<body>

<h2>Admin Login</h2>

<form method="POST">

<label>Username</label><br>
<input type="text" name="username" required>

<br><br>

<label>Password</label><br>
<input type="password" name="password" required>

<br><br>

<button type="submit" name="login">Login</button>

</form>

</body>
</html>
<?php

include("includes/db.php");

$username = "admin";
$password = password_hash("admin123", PASSWORD_DEFAULT);

// check if admin already exists
$check = mysqli_query($conn,"SELECT * FROM admins WHERE username='$username'");

if(mysqli_num_rows($check) == 0){

$query = "INSERT INTO admins (username,password)
VALUES ('$username','$password')";

mysqli_query($conn,$query);

echo "Admin seeded successfully";

}else{

echo "Admin already exists";

}

?>
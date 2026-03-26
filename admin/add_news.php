<?php
include "../includes/db.php";

if($_POST){

$title = $_POST['title'];
$date = $_POST['date'];

$image = time().$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/".$image);

mysqli_query($conn, "INSERT INTO news (title, image, date)
VALUES ('$title', '$image', '$date')");
}
?>

<form method="POST" enctype="multipart/form-data">
<input name="title"><br>
<input type="date" name="date"><br>
<input type="file" name="image"><br>
<button>Add News</button>
</form>
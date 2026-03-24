<?php
include("layout/header.php");
include("layout/sidebar.php");
include("../includes/db.php");

/* DELETE IMAGE */
if(isset($_GET['delete'])){

$id = $_GET['delete'];

// get image name
$res = mysqli_query($conn,"SELECT * FROM slider WHERE id=$id");
$row = mysqli_fetch_assoc($res);

unlink("../uploads/".$row['image']);

mysqli_query($conn,"DELETE FROM slider WHERE id=$id");

header("Location: slider.php");
}

/* UPLOAD IMAGE */
if(isset($_POST['upload'])){

$image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp,"../uploads/".$image);

mysqli_query($conn,"INSERT INTO slider(image) VALUES('$image')");
}
?>

<div class="content">

<h2>Slider Images</h2>

<form method="POST" enctype="multipart/form-data">
<input type="file" name="image" required>
<br><br>
<button name="upload">Upload</button>
</form>

<hr>

<h3>All Slider Images</h3>

<div style="display:flex; gap:20px; flex-wrap:wrap;">

<?php
$result = mysqli_query($conn,"SELECT * FROM slider");

while($row=mysqli_fetch_assoc($result)){
?>

<div style="background:white; padding:10px; border-radius:8px; text-align:center;">

<img src="../uploads/<?php echo $row['image']; ?>" width="150">

<br><br>

<a href="slider.php?delete=<?php echo $row['id']; ?>" 
onclick="return confirm('Delete this image?')">

<button style="background:red;">Delete</button>

</a>

</div>

<?php } ?>

</div>

</div>

<?php include("layout/footer.php"); ?>
<?php
include("layout/header.php");
include("layout/sidebar.php");
include("../includes/db.php");

$id = intval($_GET['id']);

$res = mysqli_query($conn,"SELECT * FROM gallery WHERE id=$id");
$row = mysqli_fetch_assoc($res);

/* UPDATE IMAGE */
if(isset($_POST['update'])){

$image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

if($image != ""){

// delete old image
unlink("../uploads/".$row['image']);

// upload new
move_uploaded_file($tmp,"../uploads/".$image);

mysqli_query($conn,"UPDATE gallery SET image='$image' WHERE id=$id");
}

header("Location: gallery.php");
exit();
}
?>

<div class="content">

<h2>Edit Image</h2>

<img src="../uploads/<?php echo $row['image']; ?>" width="200">

<form method="POST" enctype="multipart/form-data">
<br>
<input type="file" name="image">
<br><br>
<button name="update">Update</button>
</form>

</div>

<?php include("layout/footer.php"); ?>
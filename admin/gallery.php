<?php
include("layout/header.php");
include("layout/sidebar.php");
include("../includes/db.php");

if(isset($_POST['upload'])){

$image=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];

move_uploaded_file($tmp,"../uploads/".$image);

$query="INSERT INTO gallery(image) VALUES('$image')";
mysqli_query($conn,$query);

echo "Image Uploaded";

}
?>

<div class="content">

<h2>Upload Gallery Image</h2>

<form method="POST" enctype="multipart/form-data">

<input type="file" name="image">

<br><br>

<button name="upload">Upload</button>

</form>

</div>

<?php include("layout/footer.php"); ?>
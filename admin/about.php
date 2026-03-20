<?php
include("layout/header.php");
include("layout/sidebar.php");
include("../includes/db.php");

if(isset($_POST['save'])){

$description=$_POST['description'];

$image=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];

move_uploaded_file($tmp,"../uploads/".$image);

$query="INSERT INTO about(description,image) VALUES('$description','$image')";
mysqli_query($conn,$query);

echo "Saved Successfully";

}
?>

<div class="content">

<h2>About NGO</h2>

<form method="POST" enctype="multipart/form-data">

<label>Description</label>

<textarea name="description"></textarea>

<br><br>

<label>Upload Image</label>

<input type="file" name="image">

<br><br>

<button name="save">Save</button>

</form>

</div>

<?php include("layout/footer.php"); ?>
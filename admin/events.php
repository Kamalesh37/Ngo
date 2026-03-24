<?php
include("layout/header.php");
include("layout/sidebar.php");
include("../includes/db.php");

/* DELETE */
if(isset($_GET['delete'])){
$id = intval($_GET['delete']);
mysqli_query($conn,"DELETE FROM events WHERE id=$id");
header("Location: events.php");
exit();
}

/* ADD EVENT */
if(isset($_POST['add'])){

$title = $_POST['title'];
$desc = $_POST['description'];

$image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp,"../uploads/".$image);

mysqli_query($conn,"INSERT INTO events(title,description,image)
VALUES('$title','$desc','$image')");

header("Location: events.php");
exit();
}
?>

<div class="content">

<h2>Manage Events</h2>

<form method="POST" enctype="multipart/form-data">

<input type="text" name="title" placeholder="Event Title" required>
<br><br>

<textarea name="description" placeholder="Event Description"></textarea>
<br><br>

<input type="file" name="image">
<br><br>

<button name="add">Add Event</button>

</form>

<hr>

<div class="image-grid">

<?php
$res = mysqli_query($conn,"SELECT * FROM events ORDER BY id DESC");

while($row=mysqli_fetch_assoc($res)){
?>

<div class="image-card">

<img src="../uploads/<?php echo $row['image']; ?>">

<h4><?php echo $row['title']; ?></h4>

<p><?php echo substr($row['description'],0,60); ?>...</p>

<a href="edit_event.php?id=<?php echo $row['id']; ?>">
<button>Edit</button>
</a>

<a href="events.php?delete=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this event?')">
<button class="delete-btn">Delete</button>
</a>

</div>

<?php } ?>

</div>

</div>

<?php include("layout/footer.php"); ?>
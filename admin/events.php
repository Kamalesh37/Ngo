<?php
include("layout/header.php");
include("layout/sidebar.php");
include("../includes/db.php");

if(isset($_POST['save'])){

$title=$_POST['title'];
$description=$_POST['description'];
$date=$_POST['date'];

$query="INSERT INTO events(title,description,event_date)
VALUES('$title','$description','$date')";

mysqli_query($conn,$query);

echo "Event Added";

}
?>

<div class="content">

<h2>Add Event</h2>

<form method="POST">

<label>Event Title</label>
<input type="text" name="title">

<br><br>

<label>Description</label>
<textarea name="description"></textarea>

<br><br>

<label>Event Date</label>
<input type="date" name="date">

<br><br>

<button name="save">Add Event</button>

</form>

</div>

<?php include("layout/footer.php"); ?>
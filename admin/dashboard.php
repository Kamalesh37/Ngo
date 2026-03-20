<?php include("layout/header.php"); ?>

<?php include("layout/sidebar.php"); ?>

<div class="content">

<h1>Dashboard</h1>

<div class="cards">

<div class="card">
<h3>Total Events</h3>
<p>12</p>
</div>

<div class="card">
<h3>Gallery Images</h3>
<p>45</p>
</div>

<div class="card">
<h3>Total Donations</h3>
<p>₹20</p>
</div>

<div class="card">
<h3>Volunteers</h3>
<p>18</p>
</div>

</div>

<h2>Edit About Content</h2>

<form method="POST">

<textarea name="about_cont"></textarea>

<br><br>

<button type="submit">Save</button>

</form>

</div>

<?php include("layout/footer.php"); ?>
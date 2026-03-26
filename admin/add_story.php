<?php
include "../includes/db.php";

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_POST['title'];
    $excerpt = $_POST['excerpt'];
    $content = $_POST['content'];
    $category = $_POST['category'];

    // IMAGE UPLOAD
    $imageName = $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];

    $uploadPath = "../uploads/" . $imageName;

    if (move_uploaded_file($tempName, $uploadPath)) {

        $sql = "INSERT INTO impact_stories (title, excerpt, content, image, category)
                VALUES ('$title', '$excerpt', '$content', '$imageName', '$category')";

        if (mysqli_query($conn, $sql)) {
            $message = "Story added successfully!";
        } else {
            $message = "Database error!";
        }

    } else {
        $message = "Image upload failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Story</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h2>Add Impact Story</h2>

<p style="color: green;"><?php echo $message; ?></p>

<form method="POST" enctype="multipart/form-data">

    <label>Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Excerpt:</label><br>
    <textarea name="excerpt" required></textarea><br><br>

    <label>Full Content:</label><br>
    <textarea name="content" rows="6" required></textarea><br><br>

    <label>Category:</label><br>
    <select name="category" required>
        <option value="Agecare">Agecare</option>
        <option value="Healthcare">Healthcare</option>
        <option value="Livelihoods & Emergencies">Livelihoods & Emergencies</option>
        <option value="Awareness & Advocacy">Awareness & Advocacy</option>
    </select><br><br>

    <label>Upload Image:</label><br>
    <input type="file" name="image" required><br><br>

    <button type="submit">Add Story</button>

</form>

</body>
</html>
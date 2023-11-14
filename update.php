<html>
  <head>
    <link rel="stylesheet" href="public_styling.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700,900" rel="stylesheet">

  </head>
  <body>
    <div class="messages">

<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'blogs');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the data from the form
$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$author = $_POST['author'];

// Update the blog post
$sql = "UPDATE postsss SET title='$title', content='$content', author='$author' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
  echo "<h1>Blog post updated successfully</h1>";
  echo '<a href="index.php" class="modifier">Return</a>';
} else {
  echo "<h1>Error updating blog post: " . $conn->error . "</h1>";
  echo '<a href="index.php" class="modifier">Return</a>';

}

$conn->close();
?>

</div>
</body>
</html>
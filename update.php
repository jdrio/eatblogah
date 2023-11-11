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
  echo "Blog post updated successfully";
} else {
  echo "Error updating blog post: " . $conn->error;
}

$conn->close();
?>

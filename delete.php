
<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'blogs');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the ID of the blog post to delete
$id = $_GET['id'];

// Delete the blog post from the database
$sql = "DELETE FROM postsss WHERE id = $id";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

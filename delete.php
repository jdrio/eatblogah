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

// Retrieve the ID of the blog post to delete
$id = $_GET['id'];

// Delete the blog post from the database
$sql = "DELETE FROM postsss WHERE id = $id";

if ($conn->query($sql) === TRUE) {
  echo "<h1>Record deleted successfully</h1>";
  echo '<a href="index.php" class="modifier">Return</a>';

} else {
  echo "<h1>Error deleting record: " . $conn->error . "</h1>";
  echo '<a href="index.php" class="modifier">Return</a>';

}

$conn->close();
?>
</div>
</body>
</html>
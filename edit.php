<link href="https://fonts.googleapis.com/css?family=Poppins:400,700,900" rel="stylesheet">

<link rel="stylesheet" href="public_styling.css">

<div class="editform-container">
<h1> Edit a blog </h1>
<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'blogs');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the ID of the blog post to edit
$id = $_GET['id'];

// Retrieve the data for the blog post
$sql = "SELECT * FROM postsss WHERE id = $id";
$result = $conn->query($sql);

// Display the form to edit the blog post
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo "<form class=\"editform\" action=\"update.php\" method=\"post\">";

  echo "<input type=\"hidden\" name=\"id\" value=\"" . $row["id"] . "\">";
  echo "<input type=\"text\" name=\"title\" value=\"" . $row["title"] . "\">";
  echo "<textarea name=\"content\">" . $row["content"] . "</textarea>";
  echo "<input type=\"text\" name=\"author\" value=\"" . $row["author"] . "\">";
  echo "<input class=\"submit\"type=\"submit\" name=\"submit\" value=\"Save\"><br>";
  echo '<a href="index.php" class="modifier"><strong>Return</strong></a>';

  echo "</form>";


} else {
  echo "0 results";
}

$conn->close();
?>
</div>
<?php
// Connect to the database (assuming you are not reusing the existing connection)
$conn = mysqli_connect('localhost', 'root', '', 'blogs');

if (isset($_POST['submit_comment'])) {
    $blog_id = $_POST['blog_id'];
    $author = $_POST['author'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO comments (blog_id, author, comment) VALUES ('$blog_id', '$author', '$comment')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect to the blog page after submitting the comment
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

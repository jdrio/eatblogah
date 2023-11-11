<html>
    <head>
    <link rel="stylesheet" href="public_styling.css">

    </head>
    <body bgcolor="#F3EEEA" >
<?php
$conn = mysqli_connect('localhost', 'root', '', 'blogs');

    if (isset($_POST["submit"])) {
        
    $title = $_POST["title"];
    $content = $_POST["content"];
    $author = $_POST["author"];
    
    // Use backticks around the table name
    $sql = "INSERT INTO postsss (title, content,author)
            VALUES ('$title', '$content', '$author')";
    
    if (mysqli_query($conn, $sql)) {
        echo "$title<br>";
        echo "$content<br>";
        echo "$author<br>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>  
<input type="textarea" height="300px" width=500px" placeholder="Leave a comment"> 
 </body>
</html>
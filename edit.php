<html>
    <head>
    <link rel="stylesheet" href="public_styling.css">
    </head>
    <body>
        <div class="editcontainer">
    
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
            echo '<form class="editform" action=\"update.php\" method=\"post\">';
            echo "<h1>EDIT A BLOG </h1>";
            echo "<input type=\"hidden\" name=\"id\" value=\"" . $row["id"] . "\">";
            echo "<input type=\"text\" name=\"title\" value=\"" . $row["title"] . "\">";
            echo '<textarea name="content">' . $row["content"] . '</textarea>';
            echo "<input type=\"text\" name=\"author\" value=\"" . $row["author"] . "\">";
            echo "<input type=\"submit\" class=\"submit\" name=\"submit\" value=\"Save\">";
            echo "</form>";
            } else {
            echo "0 results";
            }

            $conn->close();
        ?>
</div>
</body>

</html>

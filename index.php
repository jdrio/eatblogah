<!DOCTYPE html>
<html>
<head>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,700,900" rel="stylesheet">
        <!-- Styling for public area -->
        <link rel="stylesheet" href="public_styling.css">
        <meta charset="UTF-8">
        <title>LifeBlog | Home </title>
        
</head>
<body>
        <!-- container - wraps whole page -->
        <div class="container">
                <!-- navbar -->
                <div class="navbar">
                        <div class="logo_div">
                                <a href="index.php"><h1><b>Eat Blog-ah</b></h1></a>
                        </div>
                        <ul>
                          <li><a class="active" href="index.php">Home</a></li>
                          <li><a href="https://www.gmanetwork.com/news/">News</a></li>
                          <li><a href="about.php">About</a></li>
                        </ul>
                </div>
                <!-- // navbar -->
                

                <!-- Page content -->

                <div class="form-container">
                <h1>Post a blog </h1>
                <form method="post" class="blogform">

                <input type="text" name="title" placeholder="Title"><br>

                <textarea name="content" class="content" placeholder="Content"></textarea><br>

                <input type="text" name="author" placeholder="Author"><br>
                <input type="submit" name="submit" class="blogsubmit">
                
                </form>
                </div>
                <div class="blog-container">
                <h2 class="content-title">Recent Articles</h2>

                <?php
                        // Connect to the database


                        $conn = mysqli_connect('localhost', 'root', '', 'blogs');

                        // Check connection
                        if (isset($_POST['submit'])) {
                                $title = $_POST['title'];
                                $content = $_POST['content'];
                                $author = $_POST['author'];
                              
                                $sql = "INSERT INTO postsss (title, content, author) VALUES ('$title', '$content', '$author')";
                              
                                if ($conn->query($sql) === TRUE) {
                                        echo " ";
                                      } else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                      }
                                    }
                                    
                                    $sql = "SELECT * FROM postsss ORDER BY created_at DESC";
                                    $result = $conn->query($sql);
                                    
                                    // Display the data on the webpage
                                    if ($result !== false && $result->num_rows > 0) {
                                      while($row = $result->fetch_assoc()) {
                                        echo '<div class="blog">';
                                        echo '<h2 class="blog-title" data-blog-id="' . $row["id"] . '">' . $row["title"] . '</h2>';
                                        echo '<p>Author: <b>' . $row["author"] . '</b></p>';

                                        // Add a unique identifier to the blog container div
                                        echo '<div class="blog-content" id="blog-' . $row["id"] . '">';

                                        echo '<p class="blogcontent">' . $row["content"] . '</p>';
                                        echo '<p>Created at: ' . $row["created_at"] . '</p>';

                                        // Fetch and display comments for the current blog post
                                        $blog_id = $row["id"];
                                        $commentSql = "SELECT * FROM comments WHERE blog_id = $blog_id ORDER BY created_at DESC";
                                        $commentResult = $conn->query($commentSql);

                                        echo '<div class="comments">';
                                        if ($commentResult !== false && $commentResult->num_rows > 0) {
                                        while ($commentRow = $commentResult->fetch_assoc()) {
                                                echo '<div class="comment">';
                                                echo '<p><strong>' . $commentRow["author"] . ':</strong> ' . $commentRow["comment"] . '</p>';
                                                echo '<p>Commented at: ' . $commentRow["created_at"] . '</p>';
                                                echo '</div>';
                                        }
                                        } else {
                                        echo "<p>No comments yet. Be the first to comment!</p>";
                                        }
                                        echo '</div>';

                                        // Comment form
                                        echo '<div class="comment-form">';
                                        echo '<h3>Add a Comment</h3>';
                                        echo '<form method="post" action="add_comment.php" class="commenters">';
                                        echo '<input type="hidden" name="blog_id" value="' . $row["id"] . '">';
                                        echo '<input type="text" name="author" placeholder="Your Name" class="Cname"><br>';
                                        echo '<input type="textarea" name="comment" placeholder="Your Comment" class="Ccontent"><br>';
                                        echo '<input type="submit" name="submit_comment" class="submit" value="Submit Comment">';
                                        echo '</form>';
                                        echo '</div>';
                                        echo '<a href="edit.php?id=' . $row["id"] . '" class="modify">Edit</a>';
                                        echo '<a href="delete.php?id=' . $row["id"] . '" class="modify">Delete</a>';
                                        echo '</div>'; // Close the blog-content div
                                        echo '</div>'; // Close the blog div 
                                }
                        } else {
                        echo "0 results";
                        }

                $conn->close();
                ?>






                </div>
                <div class="footer">
                        <p>MyViewers &copy; <?php echo date('Y'); ?></p>
                </div>
                <!-- // footer -->

        </div>
        <!-- // container -->
        
</body>
</html>
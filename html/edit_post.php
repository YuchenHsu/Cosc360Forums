<!-- post_detail.php -->
<div class="posts">
    <?php
        $post_id = $_GET['post_id'];
        session_start();

        try {
            include 'connect.php';

            $sql = "SELECT title, content, image, post_id, c.name AS category_name, upvotes, downvotes FROM post AS p JOIN category AS c ON p.category_id = c.id WHERE post_id = :post_id";
            $statement = $pdo->prepare($sql);
            $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
            $statement->execute();

            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $title = $row['title'];
                $upvotes = $row['upvotes'];
                $downvotes = $row['downvotes'];
                $category = $row['category_name'];
                $post_id = $row['post_id'];
                global $upvotes;
                global $downvotes;
                echo '<form class="edit_post_form form-container" id="edit_post_form" method="POST" enctype="multipart/form-data">';
                echo '<article class="post">';
                echo "<label for='title'>Post Title: </label><br><input required name='title' type='text' id='title' value='{$title}'>";
                echo "<input type='hidden' name='post_id' value='{$post_id}'>";
                echo "<h3>Category: {$category}</h3>";
                echo '<label for="post_body">Post body:</label><br>';
                echo '<textarea required rows="10" cols="60" placeholder="' . nl2br(htmlspecialchars($row['content'])) . '" id="post_body" name="post_body">' . nl2br(htmlspecialchars($row['content'])) .'</textarea><br>';
                if (!empty($row['image'])) {
                    echo '<label for="post_image">Insert image here: </label><br><input type="file" name="post_image" id="post_image" accept="image/png, image/jpeg"><br>';
                    echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '"" alt="post image"/>';
                }
                echo '<br><button type="submit" value="submit" id="edit_post_submit"> Submit </button>';
                echo '</article>';
                echo '</form>';
            } else {
                echo "<p>No post found with ID {$post_id}.</p>";
            }
            echo '</article>';
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    ?>
</div>

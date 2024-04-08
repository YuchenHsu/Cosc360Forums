<!-- profile_posts.php -->
<!-- Posts content will be loaded dynamically -->
<?php
    include 'connect.php';

    try {

        // add filters to only display posts by the user
        $sql = "SELECT title, content, image, username, post_id FROM post WHERE username = :username";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':username', $_SESSION['username']);
        $statement->execute();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo '<article class="profile-posts">';
            echo '<article class="post">';
            echo '<button class="edit_post" style="float: right;" id = '.$row['post_id'].'>Edit Post</button>';
            echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
            // add a edit button to edit the post

            echo '<p>' . nl2br(htmlspecialchars($row['content'])) . '</p>';
            if (!empty($row['image'])) {
                echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '""/>';
            }
            echo '</article>';
            echo '</article>';
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
?>

<?php
    include 'connect.php';

    try{
        // add filters to only display comments by the user
        $sql = "SELECT comment.content, comment.post_id, title FROM comment INNER JOIN post ON comment.post_id = post.post_id WHERE comment.username = :username ORDER BY comment.created_at DESC";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':username', $_SESSION['username']);
        $statement->execute();
        echo '<article class="profile-posts">';
        echo '<h2>User Comments</h2>';

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo '<article class="profile-comments">';
            echo '<article class="comment">';
            echo "<a class='post_id' href='post_detail.php?post_id={$row['post_id']}'>Post {$row['post_id']}: {$row['title']}</a>";
            echo '<p>' . nl2br(htmlspecialchars($row['content'])) . '</p>';

            echo '</article>';
            echo '</article>';
        }
        echo '</article>';

    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
?>

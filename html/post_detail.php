<!-- post_detail.php -->
<div class="posts" style="width: 75%; margin: 1em auto;">
    <?php
        $post_id = $_GET['post_id'];

        try {
            include 'connect.php';

            $sql = "SELECT title, content, image, post_id, category_id FROM post WHERE post_id = :post_id";
            $statement = $pdo->prepare($sql);
            $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
            $statement->execute();

            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $title = $row['title'];
                echo '<article class="post" style="width:90%; margin: 2em auto;">';
                echo "<h2 class='post_id'><a>{$title}</a></h2>";
                echo '<p>' . nl2br(htmlspecialchars($row['content'])) . '</p>';
                if (!empty($row['image'])) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '" style = "width: 40%; height: auto;"/>';
                }
            } else {
                echo "<p>No post found with ID {$post_id}.</p>";
            }
            echo '</article>';
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    ?>
    <div class="post_interaction">
        <span class="votes">
            <?php
                include 'connect.php';
                // Query the database for the count of upvotes and downvotes
                $sql = "SELECT vote_type, COUNT(*) as count FROM votes WHERE post_id = :post_id GROUP BY vote_type";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([':post_id' => $post_id]);
                $votes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $upvotes = 0;
                $downvotes = 0;

                foreach ($votes as $vote) {
                    if ($vote['vote_type'] == 'up') {
                        $upvotes = $vote['count'];
                    } else {
                        $downvotes = $vote['count'];
                    }
                }
            ?>

            <button class="vote upvote" data-post-id="<?php echo $post_id; ?>">↑</button><span class="upvotes"><?php echo $upvotes; ?></span>
            <button class="vote downvote" data-post-id="<?php echo $post_id; ?>">↓</button><span class="downvotes"><?php echo $downvotes; ?></span>
        </span>
        <!-- <span class="report_post"> -->
            <button class="report_post" type="submit">Report</button>
        <!-- </span> -->
        <section class="comment_container">
            <h2>Comments</h2>
            <div id="comment_content"></div>
            <?php include "comments.php"; ?>
        </section>
    </div>
</div>

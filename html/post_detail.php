<!-- post_detail.php -->
<div class="posts" style="width: 75%; margin: 1em auto;">
    <?php
        $post_id = $_GET['post_id'];

        $connString = "mysql:host=localhost; dbname=forums";
        $user = "root";
        $pass = "";

        try {
            $pdo = new PDO($connString, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
                global $upvotes;
                global $downvotes;
                echo '<article class="post" style="width:90%; margin: 2em auto;">';
                echo "<h2 class='post_id'><a>{$title}</a></h2>";
                echo "<h3>Category: {$category}</h3>";
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
            <button type="submit" id="upvote">↑</button><span><?=$upvotes?></span>
            <button type="submit" id="downvote">↓</button><span><?=$downvotes?></span>
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

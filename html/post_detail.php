<!-- post_detail.php -->
<div class="posts" style="width: 75%; margin: 1em auto;">
    <?php
        $post_id = $_GET['post_id'];
        session_start();

        try {
            include 'connect.php';

            $sql = "SELECT title, content, image, post_id, category_name, upvotes, downvotes FROM post_view; WHERE post_id = :post_id";
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
                echo '</article>';
            } else {
                echo "<p>No post found with ID {$post_id}.</p>";
            }
            echo '</article>';
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    ?>
    <form id="post_interaction" method="POST">
        <input type="hidden" id="post_id_interact" name="post_id" value="<?=$post_id?>">
        <input type="hidden" name="action" id="action">
        <span class="votes">
            <button type="submit" id="upvote" name="upvote_post">↑</button><span><?=$upvotes?></span>
            <button type="submit" id="downvote" name="downvote_post">↓</button><span><?=$downvotes?></span>
        </span>
        <!-- <span class="report_post"> -->
        <button class="report_post" type="submit" name="report_post">Report</button>
        <!-- </span> -->
    </form>
    <section class="comment_container">
        <h2>Comments</h2>
        <div id="comment_content"></div>
        <?php include "comments.php"; ?>
    </section>
</div>

<script>
$(function() {
    let action = $("#action");
    $( "#upvote" ).on( "click", function() {
        action.attr("value", "upvote_post");
        console.log("upvote");
    });
    $( "#downvote" ).on( "click", function() {
        action.attr("value", "downvote_post");
        console.log("downvote");
    });
    $( ".report_post" ).on( "click", function() {
        action.attr("value", "report_post");
        console.log("report");
    });
});

</script>

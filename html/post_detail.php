<!-- post_detail.php -->
<div class="posts">
    <?php
        $post_id = $_GET['post_id'];
        session_start();

        try {
            include 'connect.php';
            //$sql = "SELECT title, content, image, post_id, c.name AS category_name, upvotes, downvotes FROM post AS p JOIN category AS c ON p.category_id = c.id WHERE post_id = :post_id";
            $sql = "SELECT title, content, image, post_id, u.username, profile_pic, pinned, upvotes, downvotes, p.category_id AS category_id, c.name AS category_name FROM post AS p JOIN category AS c ON p.category_id = c.id JOIN user AS u ON p.username = u.username WHERE post_id = :post_id";
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
                echo '<article class="post">';
                echo "<a class='post_id'>{$title}</a>";


                echo("<div class='userinfo'>");
                if (!empty($row['profile_pic'])) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['profile_pic'] ) . '"alt = "' . $row['username'] . ' Profile Pic", class="prof_pic"/>';
                } else {
                    echo '<img src="../images/default_prof_pic.png" alt = "' . $row['username'] . ' Profile Pic", class="prof_pic"/>';
                }

                echo("<span class='username'><a href='profile.php?username={$row['username']}' class='searched_user' style='text-decoration: none; color: inherit;'>" . $row['username'] . "</a></span>");
                echo("</div><br>");

                echo "<h3 class='category'>Category: {$category}</h3>";
                echo '<p>' . nl2br(htmlspecialchars($row['content'])) . '</p>';
                if (!empty($row['image'])) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '" alt="post image"/>';
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
            <div id="upvotes"><button type="submit" id="upvote" name="upvote_post">↑</button><span><?=$upvotes?></span></div>
            <div id="downvotes"><button type="submit" id="downvote" name="downvote_post">↓</button><span><?=$downvotes?></span></div>
            <!-- <button type="submit" id="downvote" name="downvote_post">↓</button><span><?=$downvotes?></span> -->
        </span>
        <!-- <span class="report_post"> -->
        <?php
            if(isset($_SESSION['username'])){
            echo('<button class="report_post" type="submit" name="report_post">Report</button>');
        }
        ?>
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
        alert("Post has been reported.")
        console.log("report");
    });
});

</script>

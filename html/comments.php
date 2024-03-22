<?php
// session_start();
include 'connect.php';

if (!isset($_SESSION['username'])) {
    // http_response_code(401);
    // die("You must be signed in to perform this action.");
    echo "<h2 id='create_redirect' style='
    display: block;
    width: 90%;
    padding: 2em;
    margin: 0% auto;
    font-size: 1.5em;
    background-color: #ff6f59ff;
    text-align: center;
    '>You must be logged in to create a comment. Click <a href=\"login.php\" id='create_redirect'>here</a> to login.</h2>";
} else {
    try {
        $post_id = $_GET['post_id'];
        echo '<form id="comment_form" method="post" method="POST" enctype="multipart/form-data">';
        echo '<textarea id="comment_content" name="comment_content" placeholder="Write a comment..." style="width: 100%; height: 10em;" required></textarea>';
        echo '<input type="hidden" id="post_id" name="post_id" value="' . $post_id . '">';
        echo '<button id="comment_btn" type="submit" style="background-color: #ff6f59">Post Comment</button>';
        echo '</form>';
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

}
?>
<!-- show all the comment of a given post -->
<?php
include 'connect.php';

try {
    $post_id = $_GET['post_id'];
    $sql = "SELECT * FROM comment WHERE post_id = :post_id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $comment_id = $row['comment_id'];
        $username = $row['username'];
        $created_at = $row['created_at'];
        $content = $row['content'];
        echo '<article class="comment">';
        echo '<div class="comment_header">';
        echo "<span class=\"comment_username\">{$username}</span>";
        echo "<span class=\"comment_created_at\">{$created_at}</span>";
        echo '</div>';
        echo '<div class="comment_body">';
        echo $content;
        echo '</div>';
        echo '</article>';
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["post_id"]) && isset($_POST["action"])){
        $post_id = $_POST["post_id"];
        $action = $_POST["action"];

        try {
            include 'connect.php';
            $pdo->beginTransaction();

            session_start();

            if (!isset($_SESSION['username'])) {
                http_response_code(401);
                die("You must be signed in to perform this action.");
            }

            // Check if post already exists
            $sql = "SELECT * FROM post WHERE post_id = :postid";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":postid", $post_id);
            $statement->execute();
            $postExists = $statement->fetch(PDO::FETCH_ASSOC);

            if (!$postExists) {
                // Send back an error response
                http_response_code(400);
                die("Error: No post with that ID.");
            }

            if($action == "report_post"){
                $sql = "UPDATE POST SET reported = TRUE WHERE post_id = :postid";
                $statement = $pdo->prepare($sql);
                $statement->bindValue(":postid", $post_id);
                $statement->execute();
            } else if($action == "upvote_post" || $action == "downvote_post") {
                if($action == "upvote_post"){
                    $sql = "UPDATE post SET upvotes = upvotes + 1 WHERE post_id = :postid";
                } else {
                    $sql = "UPDATE post SET downvotes = downvotes + 1 WHERE post_id = :postid";
                }
                $statement = $pdo->prepare($sql);
                $statement->bindValue(":postid", $post_id);
                $statement->execute();
            } else {
                http_response_code(400);
                die("Invalid post operation.");
            }
            $pdo->commit();
        } catch (PDOException $e) {
            die( $e->getMessage() );
        }
    }
}


?>

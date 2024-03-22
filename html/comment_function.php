<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        session_start();
        if (isset($_POST["comment_content"]) && isset($_POST["post_id"])){
            $comment = $_POST["comment_content"];
            $post_id = $_POST["post_id"];
            $username = $_SESSION['username'];
            try {
                include "connect.php";
                $pdo->beginTransaction();

                $sql = "INSERT INTO comment (content, post_id, username, created_at) VALUES (:content, :post_id, :username, :created_at)";
                $statement = $pdo->prepare($sql);
                $statement->bindValue(":content", $comment);
                $statement->bindValue(":post_id", $post_id);
                $statement->bindValue(":username", $username);
                $statement->bindValue(":created_at", date("Y-m-d H:i:s", time() - 28800));
                $statement->execute();
                $pdo -> commit();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        } else {
            http_response_code(400);
            die("Error: Comment and post_id are required.");
        }
    } else {
        http_response_code(400);
        die("Error: Invalid request method.");
    }
?>

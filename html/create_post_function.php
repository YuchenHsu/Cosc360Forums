<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["title"]) && isset($_POST["post_body"])){
        $title = $_POST["title"];
        $post_body = $_POST["post_body"];
        $category_id = $_POST["category_id"];
        session_start();
        $username = $_SESSION["username"];

        try {
            include "connect.php";
            $pdo->beginTransaction();

            if (!file_exists($_FILES["post_image"]["tmp_name"]) || !is_uploaded_file($_FILES["post_image"]["tmp_name"])){
                $sql = "INSERT INTO post(title, content, category_id, username) VALUES(:title, :body, :category_id, :username)";
                $statement = $pdo->prepare($sql);
                $statement->bindValue(":title", $title);
                $statement->bindValue(":body", $post_body);
                $statement->bindValue(":category_id", $category_id);
                $statement->bindValue(":username", $username);
                $statement->execute();
            } else {
                $max_file_size = 10000000;
                $file = $_FILES["post_image"];
                $allowed_types = ['image/png', 'image/jpeg', 'image/gif', 'image/webp'];
                if($file["size"] > $max_file_size) {
                    echo("Error: File too big");
                } elseif($file["error"] != UPLOAD_ERR_OK) {
                    echo("Error: " . $file["name"] . " has error " . $file["error"] . ".");
                } elseif(!in_array(mime_content_type($file["tmp_name"]), $allowed_types)) {
                    http_response_code(400);
                    echo("Error: Invalid file type. Only png, jpg, jpeg, and gif are allowed.");
                } else {
                    $sql = "INSERT INTO post(title, content, category_id, username, image) VALUES( :title, :body, :category_id, :username, :image )";
                    $statement = $pdo->prepare($sql);
                    $statement->bindValue(":title", $title);
                    $statement->bindValue(":body", $post_body);
                    $statement->bindValue(":category_id", $category_id);
                    $statement->bindValue(":username", $username);
                    $imgcontent = file_get_contents($file["tmp_name"]);
                    $statement->bindValue(":image", $imgcontent);
                    $statement->bindValue(":category_id", $category_id);
                    $statement->execute();
                }
            }
            $pdo->commit();
        } catch (PDOException $e) {
            die( $e->getMessage() );
        }
    }
}
?>

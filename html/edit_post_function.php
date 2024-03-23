<?php
    include 'connect.php';

    try {
        $pdo->beginTransaction();
        if (!file_exists($_FILES["post_image"]["tmp_name"]) || !is_uploaded_file($_FILES["post_image"]["tmp_name"])){
            $sql = "UPDATE post SET title = :title, content = :content WHERE post_id = :post_id";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":title", $_POST["title"]);
            $statement->bindValue(":content", $_POST["post_body"]);
            $statement->bindValue(":post_id", $_POST["post_id"]);
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
                $sql = "UPDATE post SET title = :title, content = :content, image = :image WHERE post_id = :post_id";
                $statement = $pdo->prepare($sql);
                $statement->bindValue(":title", $_POST["title"]);
                $statement->bindValue(":content", $_POST["post_body"]);
                $imgcontent = file_get_contents($file["tmp_name"]);
                $statement->bindValue(":image", $imgcontent);
                $statement->bindValue(":post_id", $_POST["post_id"]);
                $statement->execute();
            }
        }
        $pdo->commit();
    } catch (PDOException $e) {
        die($e->getMessage());
    }finally{
        $pdo = null;
    }
?>

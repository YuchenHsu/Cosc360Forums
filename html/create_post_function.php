<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["title"]) && isset($_POST["post_body"])){
        $title = $_POST["title"];
        $post_body = $_POST["post_body"];
        $category_id = $_POST["category_id"];

        try {
            $connString = "mysql:host=localhost; dbname=forums";
            $user = "root";
            $pass = "";

            $pdo = new PDO($connString, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

            if (!file_exists($_FILES["post_image"]["tmp_name"]) || !is_uploaded_file($_FILES["post_image"]["tmp_name"])){
                $sql = "INSERT INTO post(title, content, category_id) VALUES(:title, :body, :category_id)";
                $statement = $pdo->prepare($sql);
                $statement->bindValue(":title", $title);
                $statement->bindValue(":body", $post_body);
                $statement->bindValue(":category_id", $category_id);
                $statement->execute();
            } else {
                $max_file_size = 10000000;
                $file = $_FILES["post_image"];
                if($file["size"] > $max_file_size) {
                    echo("Error: File too big");
                } elseif($file["error"] != UPLOAD_ERR_OK) {
                    echo("Error: " . $file["name"] . " has error " . $file["error"] . ".");
                } else {
                    $sql = "INSERT INTO post(title, content, image, category_id) VALUES( :title, :body, :image, :category_id)";
                    $statement = $pdo->prepare($sql);
                    $statement->bindValue(":title", $title);
                    $statement->bindValue(":body", $post_body);
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

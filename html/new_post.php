<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["title"]) && isset($_POST["post_body"])){
        $title = $_POST["title"];
        $post_body = $_POST["post_body"];

        try {
            $connString = "mysql:host=localhost; dbname=forums";
            $user = "root";
            $pass = "";

            $pdo = new PDO($connString, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);           

            $pdo->beginTransaction();

            if (!file_exists($_FILES["post_image"]["tmp_name"]) || !is_uploaded_file($_FILES["post_image"]["tmp_name"])){ 
                $sql = "INSERT INTO post(title, content) VALUES( :title, :body )";
                $statement = $pdo->prepare($sql);
                $statement->bindValue(":title", $title);
                $statement->bindValue(":body", $post_body);
                $statement->execute();
            } else {
                $max_file_size = 10000000;
                $file = $_FILES["post_image"];
                if($file["size"] > $max_file_size) {
                    echo("Error: File too big");
                } elseif($file["error"] != UPLOAD_ERR_OK) { 
                    echo("Error: " . $file["name"] . " has error " . $file["error"] . "."); 
                } else {
                    $sql = "INSERT INTO post(title, content, image) VALUES( :title, :body, :image )";
                    $statement = $pdo->prepare($sql);
                    $statement->bindValue(":title", $title);
                    $statement->bindValue(":body", $post_body);
                    $imgcontent = file_get_contents($file["tmp_name"]);
                    $statement->bindValue(":image", $imgcontent);
                    $statement->execute();
                }
            }
            $pdo->commit();
        } catch (PDOException $e) {
            die( $e->getMessage() );
        }
    }
}

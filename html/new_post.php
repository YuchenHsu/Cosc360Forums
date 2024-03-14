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
                echo("file no");
            } else {
                // $sql = "INSERT INTO post(title, content) VALUES( :title, :body )";
                // $statement = $pdo->prepare($sql);
                // $statement->bindValue(":title", $title);
                // $statement->bindValue(":body", $post_body);
                // $statement->execute();
                echo("file yes");
            }


            $pdo->commit();
        } catch (PDOException $e) {
            // $pdo->rollback();
            die( $e->getMessage() );
        }

        // echo("<h1>" . $title . "</h1>");
        // echo("<h3>" . $post_body . "</h3>");



    }
}

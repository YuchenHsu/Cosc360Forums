<?php
    $connString = "mysql:host=localhost; dbname=forums";
    $user = "root";
    $pass = "";

    try {
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT title, content, image, post_id FROM post";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $posts = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = $row;
        }
        echo json_encode($posts);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
?>
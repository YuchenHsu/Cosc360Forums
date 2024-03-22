<?php
    include 'connect.php';

    try {

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

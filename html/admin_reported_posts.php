<?php
    try{
        include 'connect.php';
        $sql = "SELECT title, content, post_id FROM post WHERE reported = TRUE";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $posts = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

            $posts[] = $row;
        }
        echo json_encode($posts);

    }catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }finally{
        $pdo = null;
    }
?>

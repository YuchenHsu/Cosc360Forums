<?php
    include 'connect.php';
    try{
        $sql = "SELECT username FROM user WHERE reported = TRUE";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $users = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $users[] = $row;
        }
        echo json_encode($users);

    }catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }finally{
        $pdo = null;
    }
?>
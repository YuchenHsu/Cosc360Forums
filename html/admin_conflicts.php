<?php
    try{
        include 'connect.php';
        $sql = "SELECT * FROM conflict WHERE resolved = FALSE";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $conflicts = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $conflicts[] = $row;
        }
        echo json_encode($conflicts);
    }catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }finally{
        $pdo = null;
    }
?>

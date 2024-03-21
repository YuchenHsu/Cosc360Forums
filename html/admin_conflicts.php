<?php
    $connString = "mysql:host=localhost; dbname=forums";
    $user = "root";
    $pass = "";
    try{
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM conflict WHERE resolved = FALSE";
        $statement = $pdo->prepare($sql);
        $statement->execute();
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
<?php
    $connString = "mysql:host=localhost; dbname=forums";
    $user = "root";
    $pass = "";
    try{
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //var_dump($_POST);
            if(isset($_POST['selected'])){
                $pdo = new PDO($connString, $user, $pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                foreach($_POST['selected'] as $conflict_id){
                    $sql = "UPDATE conflict SET resolved = TRUE WHERE conflict_id = :conflict_id";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(":conflict_id", $conflict_id);
                    $statement->execute();
                    $sql = "SELECT username1, username2 FROM conflict WHERE conflict_id = :conflict_id";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(":conflict_id", $conflict_id);
                    $statement->execute();
                    $row = $statement->fetch();
                    $username1 = $row['username1'];
                    $username2 = $row['username2'];
                    $sql = "UPDATE user SET disabled = TRUE, reported = FALSE WHERE username = :username1 OR username = :username2";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(":username1", $username1);
                    $statement->bindParam(":username2", $username2);
                    $statement->execute();
                }
                include "admin_conflicts.php";
            }else{
                echo "Nothing is chosen to be removed.";
            }
        }else{
            echo "Error: Invalid request method";
        }
    }catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }finally{
        $pdo = null;
    }
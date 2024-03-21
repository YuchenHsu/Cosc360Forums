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
                foreach($_POST['selected'] as $username){
                    $sql = "UPDATE user SET disabled = TRUE, reported = FALSE WHERE username = :username";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(":username", $username);
                    $statement->execute();
                }
                include "admin_reported_users.php";
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
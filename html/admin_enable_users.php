<?php
    try{
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //var_dump($_POST);
            if(isset($_POST['selected'])){
                include 'connect.php';
                foreach($_POST['selected'] as $username){
                    $sql = "UPDATE user SET disabled = FALSE, reported = FALSE WHERE username = :username";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(":username", $username);
                    $statement->execute();
                }
                include "admin_reported_users.php";
            }else{
                echo "Nothing is chosen to be enabled.";
            }
        }else{
            echo "Error: Invalid request method";
        }
    }catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }finally{
        $pdo = null;
    }
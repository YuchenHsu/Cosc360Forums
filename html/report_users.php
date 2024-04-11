<?php
    try{
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //var_dump($_POST);
            if(isset($_POST['username'])){
                $username = $_POST['username'];
                include 'connect.php';
                echo "User " . $username . " has been reported.";
                $sql = "UPDATE user SET reported = TRUE WHERE username = :username";
                $statement = $pdo->prepare($sql);
                $statement->bindParam(":username", $username);
                $statement->execute();
                    
            }else{
                echo "Nothing is chosen to be Reported.";
            }
        }else{
            echo "Error: Invalid request method";
        }
    }catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }finally{
        $pdo = null;
    }
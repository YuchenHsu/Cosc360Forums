<?php
    try{
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //var_dump($_POST);
            if(isset($_POST['selected'])){
                include "connect.php";
                foreach($_POST['selected'] as $post_id){
                    $sql = "DELETE FROM post WHERE post_id = :post_id";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(":post_id", $post_id);
                    $statement->execute();
                }
                include "admin_reported_posts.php";
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

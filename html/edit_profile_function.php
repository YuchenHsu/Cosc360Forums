<?php
    $connString = "mysql:host=localhost; dbname=forums";
    $user = "root";
    $pass = "";
    try {
        session_start();
        // Connect to the database
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();
        // Check if post or get
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            // Check if search and filter are set
            if(isset($_POST['full_name']) && isset($_POST['email'])){
                // Check if search and filter are not empty
                if(!empty($_POST['full_name']) && !empty($_POST['email'])){
                    if(!empty($_FILES["image"]["tmp_name"])){
                        $full_name = $_POST['full_name'];
                        $email = $_POST['email'];
                        $image = file_get_contents($_FILES["image"]["tmp_name"]);
                         // check if full name is valid
                         if (!preg_match("/^[a-zA-Z0-9\s]*$/", $full_name)) {
                            http_response_code(400);
                            die("Error: Full name must contain only letters, numbers, and spaces.");
                        }
    
                        // check if email is valid
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            http_response_code(400);
                            die("Error: Invalid email.");
                        }
                        $sql = "UPDATE user SET full_name = :full_name, email = :email, profile_pic = :profile_pic WHERE username = :username";
                        $statement = $pdo->prepare($sql);
                        $statement->bindParam(':full_name', $full_name);
                        $statement->bindParam(':email', $email);
                        $statement->bindParam(':profile_pic', $image);
                        $statement->bindParam(':username', $_SESSION['username']);
                        $statement->execute();
                        echo $statement->rowCount() . " records UPDATED successfully";
                        $pdo->commit();
                        header("Location: profile.php");
                    }else{
                        echo "Error: Image cannot be empty";
                        var_dump($_FILES);
                        echo $_FILES['file_input']['error'];
                    }
                   
                } else {
                    echo "Error: Full name and email cannot be empty";
                }
            } else {
                echo "Error: Full name and email not set";
            }
        } else {
            echo "Error: Request method is not POST";
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }finally{
        $pdo = null;
    }
?>
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
                    $full_name = $_POST['full_name'];
                    $email = $_POST['email'];
                    if (!preg_match("/^[a-zA-Z0-9\s]*$/", $full_name)) {
                        http_response_code(400);
                        die("Error: Full name must contain only letters, numbers, and spaces.");
                    }

                    // check if email is valid
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        http_response_code(400);
                        die("Error: Invalid email.");
                    }
                    if(file_exists($_FILES["profile_img"]["tmp_name"]) || is_uploaded_file($_FILES["profile_img"]["tmp_name"])){
                        $max_file_size = 10000000;
                        $file = $_FILES["profile_img"];
                        $allowed_types = ['image/png', 'image/jpeg', 'image/gif', 'image/webp'];
                        if($file["size"] > $max_file_size) {
                            echo("Error: File too big");
                        } elseif($file["error"] != UPLOAD_ERR_OK) {
                            echo("Error: " . $file["name"] . " has error " . $file["error"] . ".");
                        } elseif(!in_array(mime_content_type($file["tmp_name"]), $allowed_types)) {
                            http_response_code(400);
                            echo("Error: Invalid file type. Only png, jpg, jpeg, and gif are allowed.");
                        } else {
                            $profile_img = file_get_contents($_FILES["profile_img"]["tmp_name"]);
                            // check if full name is valid
                            $sql = "UPDATE user SET full_name = :full_name, email = :email, profile_pic = :profile_pic WHERE username = :username";
                            $statement = $pdo->prepare($sql);
                            $statement->bindParam(':full_name', $full_name);
                            $statement->bindParam(':email', $email);
                            $statement->bindParam(':profile_pic', $profile_img);
                            $statement->bindParam(':username', $_SESSION['username']);
                            $statement->execute();
                            $pdo->commit();
                            header("Location: profile.php");
                        }
                    }else{
                        $sql = "UPDATE user SET full_name = :full_name, email = :email WHERE username = :username";
                        $statement = $pdo->prepare($sql);
                        $statement->bindParam(':full_name', $full_name);
                        $statement->bindParam(':email', $email);
                        $statement->bindParam(':username', $_SESSION['username']);
                        $statement->execute();
                        $pdo->commit();
                        header("Location: profile.php");
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

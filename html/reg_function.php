<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["reg_username"]) && isset($_POST["full_name"]) && isset($_POST["email"]) && isset($_POST["reg_password"]) && isset($_POST["conf_password"])){
        $username = $_POST["reg_username"];
        $full_name = $_POST["full_name"];
        $email = $_POST["email"];
        $password = $_POST["reg_password"];
        $conf_password = $_POST["conf_password"];

        // Password validation
        if (strlen($password) < 8) {
            http_response_code(400);
            die("Error: Password must be at least 8 characters.");
        }
        if (!preg_match("/[A-Z]/", $password)) {
            http_response_code(400);
            die("Error: Password must contain at least one uppercase letter.");
        }
        if (!preg_match("/[a-z]/", $password)) {
            http_response_code(400);
            die("Error: Password must contain at least one lowercase letter.");
        }
        if (!preg_match("/[0-9]/", $password)) {
            http_response_code(400);
            die("Error: Password must contain at least one number.");
        }

        // check if username is valid
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            http_response_code(400);
            die("Error: Username must contain only letters and numbers.");
        }

        // check if full name is valid
        if (!preg_match("/^[a-zA-Z0-9\s]*$/", $full_name)) {
            http_response_code(400);
            die("Error: Full name must contain only letters, numbers, and spaces.");
        }

        // Check if passwords match
        if ($password !== $conf_password) {
            http_response_code(400);
            die("Error: Passwords do not match.");
        }

        // check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            die("Error: Invalid email.");
        }

        try {
            include "connect.php";
            $pdo->beginTransaction();

            // Check if username already exists
            $sql = "SELECT * FROM user WHERE username = :username";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":username", $username);
            $statement->execute();
            $userExists = $statement->fetch(PDO::FETCH_ASSOC);

            if ($userExists) {
                // Send back an error response
                http_response_code(400);
                echo "Error: Username already exists.";
                exit();
            }

            $hashed_passowrd = password_hash($password, PASSWORD_DEFAULT);
            if ($hashed_passowrd === false) {
                http_response_code(500);
                die("Error: Password hash failed.");
            }

            // Check if a file was uploaded
            if (!file_exists($_FILES["profile_pic"]["tmp_name"]) || !is_uploaded_file($_FILES["profile_pic"]["tmp_name"])){
                $sql = "INSERT INTO user(username, full_name, email, password) VALUES( :username, :full_name, :email, :password )";
                $statement = $pdo->prepare($sql);
                $statement->bindValue(":username", $username);
                $statement->bindValue(":full_name", $full_name);
                $statement->bindValue(":email", $email);
                $statement->bindValue(":password", $hashed_passowrd);
                $statement->execute();
            } else {
                $max_file_size = 10000000;
                $file = $_FILES["profile_pic"];
                $allowed_types = ['image/png', 'image/jpeg', 'image/gif', 'image/webp'];

                if($file["size"] > $max_file_size) {
                    echo("Error: File too big");
                } elseif($file["error"] != UPLOAD_ERR_OK) {
                    echo("Error: " . $file["name"] . " has error " . $file["error"] . ".");
                } elseif(!in_array(mime_content_type($file["tmp_name"]), $allowed_types)) {
                    http_response_code(400);
                    echo("Error: Invalid file type. Only png, jpg, jpeg, and gif are allowed.");
                } else {
                    $sql = "INSERT INTO user(username, full_name, email, password, profile_pic) VALUES( :username, :full_name, :email, :password, :profile_pic )";
                    $statement = $pdo->prepare($sql);
                    $statement->bindValue(":username", $username);
                    $statement->bindValue(":full_name", $full_name);
                    $statement->bindValue(":email", $email);
                    $statement->bindValue(":password", $hashed_passowrd);
                    $imgcontent = file_get_contents($file["tmp_name"]);
                    $statement->bindValue(":profile_pic", $imgcontent);
                    $statement->execute();
                }
            }
            $pdo->commit();
        } catch (PDOException $e) {
            die( $e->getMessage() );
        }
    }
}
?>

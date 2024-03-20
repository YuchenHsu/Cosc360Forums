<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["reg_username"]) && isset($_POST["full_name"]) && isset($_POST["email"]) && isset($_POST["reg_password"]) && isset($_POST["conf_password"])){
        $username = $_POST["reg_username"];
        $full_name = $_POST["full_name"];
        $email = $_POST["email"];
        $password = $_POST["reg_password"];
        $conf_password = $_POST["conf_password"];

        // Check if passwords match
        if ($password !== $conf_password) {
            die("Error: Passwords do not match.");
        }

        try {
            $connString = "mysql:host=localhost; dbname=forums";
            $user = "root";
            $pass = "";

            $pdo = new PDO($connString, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);           

            $pdo->beginTransaction();

            // Check if a file was uploaded
            if (!file_exists($_FILES["profile_pic"]["tmp_name"]) || !is_uploaded_file($_FILES["profile_pic"]["tmp_name"])){ 
                $sql = "INSERT INTO user(username, full_name, email, password) VALUES( :username, :full_name, :email, :password )";
                $statement = $pdo->prepare($sql);
                $statement->bindValue(":username", $username);
                $statement->bindValue(":full_name", $full_name);
                $statement->bindValue(":email", $email);
                $statement->bindValue(":password", $password);
                $statement->execute();
            } else {
                $max_file_size = 10000000;
                $file = $_FILES["profile_pic"];
                if($file["size"] > $max_file_size) {
                    echo("Error: File too big");
                } elseif($file["error"] != UPLOAD_ERR_OK) { 
                    echo("Error: " . $file["name"] . " has error " . $file["error"] . "."); 
                } else {
                    // $sql = "INSERT INTO users(username, full_name, email, password, profile_pic) VALUES( :username, :full_name, :email, :password, :profile_pic )";
                    // $statement = $pdo->prepare($sql);
                    // $statement->bindValue(":username", $username);
                    // $statement->bindValue(":full_name", $full_name);
                    // $statement->bindValue(":email", $email);
                    // $statement->bindValue(":password", $password);
                    // $imgcontent = file_get_contents($file["tmp_name"]);
                    // $statement->bindValue(":profile_pic", $imgcontent);
                    // $statement->execute();
                }
            }
            $pdo->commit();
        } catch (PDOException $e) {
            die( $e->getMessage() );
        }
    }
}
?>

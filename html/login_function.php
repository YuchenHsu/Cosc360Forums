<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST["username"]) && isset($_POST["password"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $remember = isset($_POST["remember"]);

            try {
                include "connect.php";

                // Check if username exists and get the associated password
                $sql = "SELECT password, disabled FROM user WHERE username = :username";
                $statement = $pdo->prepare($sql);
                $statement->bindValue(":username", $username);
                $statement->execute();

                $result = $statement->fetch(PDO::FETCH_ASSOC);

                if ($result) {
                    if ($result['disabled'] == 1) {
                        http_response_code(403);
                        die("Error: Account is disabled.");
                    }else{
                    // Verify the password
                        if (password_verify($password, $result['password'])) {
                            echo "Login successful!";
                            // Start a session and set the username session variable
                            session_start();
                            // Regenerate session ID to prevent session fixation attacks
                            session_regenerate_id(true);
                            $_SESSION['username'] = $username;
                            if ($remember==1) {
                                setcookie("username", $username, time() + 60 * 60 * 24 * 30);
                            }
                            echo json_encode(array('username' => $username, 'remember' => $remember));
                        } else {
                            http_response_code(401);
                            echo "Error: Incorrect password.";
                        }
                    }
                } else {
                    http_response_code(404);
                    echo "Error: Username does not exist.";
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        } else {
            http_response_code(400);
            die("Error: Username and password are required.");
        }
    } else {
        http_response_code(400);
        die("Error: Invalid request method.");
    }
?>

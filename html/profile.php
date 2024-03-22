<!-- make an invisible profile page that's toggled by the js -->
<div id="profile" class="form-container">
    <div class="profile-container">
        <div class="profile">
            <?php
                // Start the session
                session_start();

                $connString = "mysql:host=localhost; dbname=forums";
                $user = "root";
                $pass = "";
                try{
                    $pdo = new PDO($connString, $user, $pass);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $pdo->beginTransaction();
                    if($_SERVER['REQUEST_METHOD'] == "GET"){
                        if(isset($_GET['username'])){
                            $username = $_GET['username'];
                        }else{
                            $username = $_SESSION['username'];
                        }
                            $sql = "SELECT * FROM user WHERE username = :username";
                            $statement = $pdo->prepare($sql);

                            // Access the username from the session
                            $statement->bindValue(":username", $username);
                            $statement->execute();
                            $user = $statement->fetch(PDO::FETCH_ASSOC);
                            echo "<form id=edit_profile_form action=POST enctype=multipart/form-data>";
                            printf("<img class=\"profile-pic\" src=\"data:image/jpeg;base64,%s\" alt=\"Profile Picture\">", base64_encode($user['profile_pic']));
                            echo "<h2>User Profile</h2>";
                            echo "<div id=image_input></div>";
                            echo "<p><strong>Username:</strong> " . $user['username'] . "</p>";
                            echo "<p><strong>Full Name:</strong> <div id=full_name_input>" . $user['full_name'] . "</div></p>";
                            echo "<p><strong>Email:</strong><div id=email_input>" . $user['email'] . "</div></p>";
                            echo "<p><strong>Join Date:</strong> " . $user['created_at'] . "</p>";
                            if (isset($_SESSION['username'])) {
                                if (strcasecmp($_SESSION['username'], $username) == 0) {
                                    echo "<div id=button_stuff>";
                                    echo "<button id=\"edit_profile\">Edit Profile</button>";
                                    echo "</div>";
                                }
                            }
                            echo "</form>";
                    }else{
                        echo "Error: GET request not received.";
                    }

                } catch (PDOException $e) {
                    die($e->getMessage());
                }finally{
                    $pdo = null;
                }
            ?>
        </div>
        <?php include "profile_posts.php"; ?>
    </div>
</div>

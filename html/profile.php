<!-- make an invisible profile page that's toggled by the js -->
<div id="profile" class="form-container">
    <div class="profile-container">
        <div class="profile">
            <?php
                // Start the session
                session_start();
                include 'connect.php';
                try{
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
                        echo "<form id='edit_profile_form' action='POST' enctype='multipart/form-data'>";
                        printf("<img class=\"profile-pic\" src=\"data:image/jpeg;base64,%s\" alt=\"Profile Picture\">", base64_encode($user['profile_pic']));
                        echo "<h2>User Profile</h2>";
                        echo "<div id=image_div></div>";
                        echo "<p><label for='username'>Username: </label> <div id=username_div>" . $user['username'] . "</div></p>";
                        echo "<p><label for='full_name'>Full Name: </label> <div id=full_name_div>" . $user['full_name'] . "</div></p>";
                        echo "<p><label for='email'>Email: </label><div id=email_div>" . $user['email'] . "</div></p>";
                        echo "<p><label for='join_date'>Join Date: </label>" . $user['created_at'] . "</p>";
                        if (isset($_SESSION['username'])) {
                            if (strcasecmp($_SESSION['username'], $username) == 0) {
                                echo "<div id='edit_profile_button'>";
                                echo "<button id=\"edit_profile\">Edit Profile</button>";
                                echo "</div>";
                                echo "</form>";
                            }else{
                                echo "</form>";
                                // Report button form
                                echo "<form id='report_form' action='POST'>";
                                echo "<div id='report_button'>";
                                echo "<input type='hidden' name='username' value='" . $user['username'] . "'>";
                                echo "<button type='submit' id=\"report_user\">Report</button>";
                                echo "</div>";
                                echo "</form>";
                            }
                        }
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

<!-- make an invisible profile page that's toggled by the js -->
<div id="profile" class="form-container">
    <div class="profile-container">
        <div class="profile">
            <img class="profile-pic" src="../images/social/twitter_16.png" alt="Profile Picture">
            <?php
                // Start the session
                session_start();

                include "connect.php";

                $pdo->beginTransaction();

                $sql = "SELECT * FROM user WHERE username = :username";
                $statement = $pdo->prepare($sql);
                // Access the username from the session
                $statement->bindValue(":username", $_SESSION["username"]);
                $statement->execute();
                $user = $statement->fetch(PDO::FETCH_ASSOC);
                printf("<img class=\"profile-pic\" src=\"data:image/jpeg;base64,%s\" alt=\"Profile Picture\">", base64_encode($user['profile_pic']));

                echo "<h2>User Profile</h2>";
                echo "<p><strong>Username:</strong> " . $user['username'] . "</p>";
                echo "<p><strong>Email:</strong> " . $user['email'] . "</p>";
            ?>
        </div>
        <?php include "profile_posts.php"; ?>
    </div>
</div>

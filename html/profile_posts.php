<!-- profile_posts.php -->
<!-- Posts content will be loaded dynamically -->
<?php
    include 'connect.php';

    try {

        // add filters to only display posts by the user
        $sql = "SELECT title, content, image, username FROM post WHERE username = :username";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':username', $_SESSION['username']);
        $statement->execute();


        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo '<article class="profile-posts">';
            echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
            echo '<p>' . nl2br(htmlspecialchars($row['content'])) . '</p>';
            if (!empty($row['image'])) {
                echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '" style = "width: 40%; height: auto;"/>';
            }
            echo '</article>';
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
?>


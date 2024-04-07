<div id="mod-reports">
    <h2>Analytics</h2>
    <p>Here you can view the reports for the forum.</p>
    <figure>
        <img src="../images/posts.png" alt="New Users Over Time">
        <figcaption>New Users Over Time</figcaption>
    </figure>
    <figure>
        <img src="../images/posts.png" alt="Posts Over Time">
        <figcaption>Posts Over Time</figcaption>
    </figure>
    <?php
        include 'connect.php';

        try {
            // Get posts per day for the past 7 days
            $sql = "SELECT DATE(created_at) as date, COUNT(*) as count FROM post WHERE created_at >= NOW() - INTERVAL 7 DAY GROUP BY DATE(created_at)";
            $statement = $pdo->prepare($sql);
            $statement->execute();

            echo "Posts per day for the past 7 days:<br>";
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo "Date: " . $row['date'] . ", Count: " . $row['count'] . "<br>";
            }

            // Get comments per day for the past 7 days
            $sql = "SELECT DATE(created_at) as date, COUNT(*) as count FROM comment WHERE created_at >= NOW() - INTERVAL 7 DAY GROUP BY DATE(created_at)";
            $statement = $pdo->prepare($sql);
            $statement->execute();

            echo "Comments per day for the past 7 days:<br>";
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo "Date: " . $row['date'] . ", Count: " . $row['count'] . "<br>";
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    ?>
</div>

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
            $sql = "SELECT DATE(time) as date, COUNT(*) as count FROM post WHERE time >= NOW() - INTERVAL 7 DAY GROUP BY DATE(time)";
            $statement = $pdo->prepare($sql);
            $statement->execute();

            echo "Posts per day for the past 7 days:<br>";
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo "Date: " . $row['date'] . ", Count: " . $row['count'] . "<br>";
            }

            // Get comments per day for the past 7 days
            // Assuming you have a 'comments' table with a 'time' column
            $sql = "SELECT DATE(time) as date, COUNT(*) as count FROM comments WHERE time >= NOW() - INTERVAL 7 DAY GROUP BY DATE(time)";
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

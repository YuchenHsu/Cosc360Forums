<div id="mod-reports">
    <h1>Analytics</h1>
    <p>Here you can view the new user count, post count, and comment count for the past 7 days.</p>
    <!-- <figure>
        <img src="../images/posts.png" alt="New Users Over Time">
        <figcaption>New Users Over Time</figcaption>
    </figure>
    <figure>
        <img src="../images/posts.png" alt="Posts Over Time">
        <figcaption>Posts Over Time</figcaption>
    </figure> -->
    <!-- <?php
        include 'connect.php';

        try {
            // Get posts per day for the past 7 days
            $sql = "SELECT DATE(created_at) as date, COUNT(*) as count FROM post WHERE created_at >= NOW() - INTERVAL 7 DAY GROUP BY DATE(created_at)";
            $statement = $pdo->prepare($sql);
            $statement->execute();

            echo "<article class='admin_analytics'>";
            echo "<h2>Posts per day for the past 7 days:</h2><br>";
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo "Date: " . $row['date'] . ", Count: " . $row['count'] . "<br>";
            }
            echo "</article>";

            // Get comments per day for the past 7 days
            $sql = "SELECT DATE(created_at) as date, COUNT(*) as count FROM comment WHERE created_at >= NOW() - INTERVAL 7 DAY GROUP BY DATE(created_at)";
            $statement = $pdo->prepare($sql);
            $statement->execute();

            echo "<article class='admin_analytics'>";
            echo "<h2>Comments per day for the past 7 days:</h2><br>";
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo "Date: " . $row['date'] . ", Count: " . $row['count'] . "<br>";
            }
            echo "</article>";
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    ?> -->
    <?php
    include 'connect.php';

    try {
        // Get posts per day for the past 7 days
        $sql = "SELECT DATE(created_at) as date, COUNT(*) as count FROM post WHERE created_at >= NOW() - INTERVAL 7 DAY GROUP BY DATE(created_at)";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $postsData = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $postsData[] = $row;
        }

        // Get comments per day for the past 7 days
        $sql = "SELECT DATE(created_at) as date, COUNT(*) as count FROM comment WHERE created_at >= NOW() - INTERVAL 7 DAY GROUP BY DATE(created_at)";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $commentsData = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $commentsData[] = $row;
        }

        // Get new users per day for the past 7 days
        $sql = "SELECT DATE(created_at) as date, COUNT(*) as count FROM user WHERE created_at >= NOW() - INTERVAL 7 DAY GROUP BY DATE(created_at)";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $usersData = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $usersData[] = $row;
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
    ?>
    <canvas id="postsChart" aria-label="Posts per day for the past 7 days"></canvas>
    <canvas id="commentsChart" aria-label="Comments per day for the past 7 days"></canvas>
    <canvas id="usersChart" aria-label="New users per day for the past 7 days"></canvas>
    <script>
    var ctx = document.getElementById('postsChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo '"' . implode('","', array_column($postsData, 'date')) . '"'; ?>],
            datasets: [{
                label: 'Posts per day for the past 7 days',
                data: [<?php echo implode(',', array_column($postsData, 'count')); ?>],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var ctx = document.getElementById('commentsChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo '"' . implode('","', array_column($commentsData, 'date')) . '"'; ?>],
            datasets: [{
                label: 'Comments per day for the past 7 days',
                data: [<?php echo implode(',', array_column($commentsData, 'count')); ?>],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var ctx = document.getElementById('usersChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo '"' . implode('","', array_column($usersData, 'date')) . '"'; ?>],
            datasets: [{
                label: 'New users per day for the past 7 days',
                data: [<?php echo implode(',', array_column($usersData, 'count')); ?>],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
</div>

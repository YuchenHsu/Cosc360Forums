<div id="mod-reports">
    <h1>Reports</h1>
    <p>Here you can view the reports for the forum.</p>
    <!-- <?php
    include 'connect.php';

    try {
        // Get active users per day for the past 7 days
        $sql = "SELECT activity_date, COUNT(DISTINCT username) as count FROM (
                    SELECT DATE(created_at) as activity_date, username FROM post
                    UNION ALL
                    SELECT DATE(created_at) as activity_date, username FROM comment
                ) as activities
                WHERE activity_date >= NOW() - INTERVAL 7 DAY
                GROUP BY activity_date";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        echo "<article class='admin_reports'>";
        echo "<h2>Active users per day for the past 7 days:</h2><br>";
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo "Date: " . $row['activity_date'] . ", Count: " . $row['count'] . "<br>";
        }
        echo "</article>";

        // Get average comments per post for the past 7 days
        $sql = "SELECT p.post_id, p.title, (SELECT COUNT(*) FROM comment WHERE post_id = p.post_id AND created_at >= NOW() - INTERVAL 7 DAY) as comment_count FROM post p WHERE p.created_at >= NOW() - INTERVAL 7 DAY";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        echo "<article class='admin_reports'>";
        echo "<h2>Average comments per post for the past 7 days:</h2><br>";
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo "Post ID: " . $row['post_id'] . ", Title: " . $row['title'] . ", Comment Count: " . $row['comment_count'] . "<br>";
        }
        echo "</article>";

        // Get category popularity for the past 7 days
        $sql = "SELECT c.name, COUNT(*) as count FROM post p JOIN category c ON p.category_id = c.id WHERE p.created_at >= NOW() - INTERVAL 7 DAY GROUP BY c.name";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        echo "<article class='admin_reports'>";
        echo "<h2>Category popularity for the past 7 days:</h2><br>";
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo "Category: " . $row['name'] . ", Count: " . $row['count'] . "<br>";
        }
        echo "</article>";

        // Get average comments per post per day for the past 7 days
        $sql = "SELECT post_date, AVG(comment_count) as avg_comment_count FROM (
            SELECT DATE(p.created_at) as post_date, p.post_id, (SELECT COUNT(*) FROM comment WHERE post_id = p.post_id AND DATE(created_at) = post_date) as comment_count
            FROM post p
            WHERE p.created_at >= NOW() - INTERVAL 7 DAY
        ) as post_comments
        GROUP BY post_date";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        echo "<article class='admin_reports'>";
        echo "<h2>Average comments per post per day for the past 7 days:</h2><br>";
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "Date: " . $row['post_date'] . ", Average Comment Count: " . $row['avg_comment_count'] . "<br>";
        }
        echo "</article>";
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
    ?> -->

    <?php
    include 'connect.php';

    try {
        // Get active users per day for the past 7 days
        $sql = "SELECT activity_date, COUNT(DISTINCT username) as count FROM (
                    SELECT DATE(created_at) as activity_date, username FROM post
                    UNION ALL
                    SELECT DATE(created_at) as activity_date, username FROM comment
                ) as activities
                WHERE activity_date >= NOW() - INTERVAL 7 DAY
                GROUP BY activity_date";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $activeUsersData = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $activeUsersData[] = $row;
        }

        // Get average comments per post for the past 7 days
        $sql = "SELECT p.post_id, p.title, (SELECT COUNT(*) FROM comment WHERE post_id = p.post_id AND created_at >= NOW() - INTERVAL 7 DAY) as comment_count FROM post p WHERE p.created_at >= NOW() - INTERVAL 7 DAY";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $postEngagementData = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $postEngagementData[] = $row;
        }

        // Get category popularity for the past 7 days
        $sql = "SELECT c.name, COUNT(*) as count FROM post p JOIN category c ON p.category_id = c.id WHERE p.created_at >= NOW() - INTERVAL 7 DAY GROUP BY c.name";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $categoryPopularityData = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $categoryPopularityData[] = $row;
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
    ?>

    <canvas id="activeUsersChart"></canvas>
    <canvas id="postEngagementChart"></canvas>
    <canvas id="categoryPopularityChart"></canvas>

    <script>
    var ctx = document.getElementById('activeUsersChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo '"' . implode('","', array_column($activeUsersData, 'activity_date')) . '"'; ?>],
            datasets: [{
                label: 'Active users per day for the past 7 days',
                data: [<?php echo implode(',', array_column($activeUsersData, 'count')); ?>],
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

    var ctx = document.getElementById('postEngagementChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo '"' . implode('","', array_column($postEngagementData, 'title')) . '"'; ?>],
            datasets: [{
                label: 'Average comments per post for the past 7 days',
                data: [<?php echo implode(',', array_column($postEngagementData, 'comment_count')); ?>],
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

    var ctx = document.getElementById('categoryPopularityChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo '"' . implode('","', array_column($categoryPopularityData, 'name')) . '"'; ?>],
            datasets: [{
                label: 'Category popularity for the past 7 days',
                data: [<?php echo implode(',', array_column($categoryPopularityData, 'count')); ?>],
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
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

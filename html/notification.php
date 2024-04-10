<!-- Make a invisible notification page that's toggled by the js -->
<link rel="stylesheet" type="text/css" href="../css/notification.css">
<div id="notification" class="form-container">
    <div id="notification-content">
        <?php
            include "connect.php";
            session_start();
            if (isset($_SESSION['username'])) {
                try {
                    
                    $sql = "SELECT * FROM notification WHERE username = :username ORDER BY created_at DESC";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':username', $_SESSION['username']);
                    $stmt->execute();
                    $notifications = $stmt->fetchAll();
                    if (count($notifications) == 0) {
                        echo "<p>No notifications</p>";
                    } else {
                        echo "<table>";
                        echo "<caption>Notifications</caption>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Date</th>";
                        echo "<th>Notification</th>";
                        echo "</tr>";
                        echo "<tbody>";
                        foreach ($notifications as $notification) {
                            $post_id = $notification['post_id'];
                            $sql = "SELECT title FROM post WHERE post_id = :post_id";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindValue(':post_id', $post_id);
                            $stmt->execute();
                            $post = $stmt->fetch();
                            $post_title = $post['title'];
                            $post_link = "<a class='post_id notification' href='post_detail.php?post_id={$post_id}'>{$post_title}</a>";

                            echo "<tr>";
                            echo "<td>{$notification['created_at']}</td>";
                            echo "<td>{$notification['content']}" . $post_link . "</td>";
                            
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    }
                    // mark notifications as read
                    $sql = "UPDATE notification SET unread = 0 WHERE username = :username";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':username', $_SESSION['username']);
                    $stmt->execute();
             
                } catch (PDOException $e) {
                die($e->getMessage());
                }finally{
                $pdo = null;
                }
            } else {
                echo "<p>Please login to view notifications</p>";
            }
        ?>
    <div>
</div>

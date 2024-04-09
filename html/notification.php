<!-- Make a invisible notification page that's toggled by the js -->
<div id="notification" class="form-container">
    <h3>Notifications</h3>
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
                        foreach ($notifications as $notification) {
                            echo "<p>{$notification['content']}</p>";
                        }
                    }
             
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

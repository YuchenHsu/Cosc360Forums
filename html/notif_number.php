<?php
session_start();
include "connect.php";
if(isset($_SESSION['username'])){
    $sql = "SELECT COUNT(notification_id) AS total FROM notification WHERE username = :username AND unread = 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', $_SESSION['username']);
    $stmt->execute();
    $notification = $stmt->fetch();
    $count = $notification['total'];
}else {
    $count = 0;
}
echo $count;
?>

<?php
    session_start();
    include 'connect.php';

    $username = $_SESSION['username'];
    $post_id = $_POST['post_id'];
    $vote_type = $_POST['vote_type'];

    try {
        // Check if the user has already voted
        $sql = "SELECT vote_type FROM votes WHERE username = :username AND post_id = :post_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':username' => $username, ':post_id' => $post_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // User has already voted. Update the vote.
            if ($row['vote_type'] != $vote_type) {
                $sql = "UPDATE votes SET vote_type = :vote_type WHERE username = :username AND post_id = :post_id";
            } else {
                // User clicked the button again. Remove the vote.
                $sql = "DELETE FROM votes WHERE username = :username AND post_id = :post_id";
            }
        } else {
            // User has not voted yet. Insert a new vote.
            $sql = "INSERT INTO votes (username, post_id, vote_type) VALUES (:username, :post_id, :vote_type)";
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute([':username' => $username, ':post_id' => $post_id, ':vote_type' => $vote_type]);

        echo 'Vote submitted successfully.';
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
?>

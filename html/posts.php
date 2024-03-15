<!-- posts.php -->
<!-- Posts content will be loaded dynamically -->
<h1>Welcome to My Blog!</h1>
<p>Here are some interesting posts:</p>
<?php
    $connString = "mysql:host=localhost; dbname=forums";
    $user = "root";
    $pass = "";

    try {
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT title, content, image, post_id FROM post";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $title = $row['title'];
            $post_id = $row['post_id'];
            echo '<article class="post">';
?>

<h2><a href="view_post.php?post_id=<?=$post_id?>">Post <?=$post_id?>: <?=$title?></a></h2>

<?php
            echo '<p>' . nl2br(htmlspecialchars($row['content'])) . '</p>';
            if (!empty($row['image'])) {
                echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '" style = "width: 75%; height: auto;"/>';
            }
            echo '</article>';
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
?>


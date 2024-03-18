<!-- posts.php -->
<!-- Posts content will be loaded dynamically -->
<h1>Welcome to My Blog!</h1>
<p>Here are some interesting posts:</p>
<?php
    $connString = "mysql:host=localhost; dbname=forums";
    $user = "root";
    $pass = "";

    try {
        // check if post or get
        if ($_SERVER['REQUEST_METHOD'] == "GET"){
            // Connect to the database
            $pdo = new PDO($connString, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Check if search and filter are set
            if(isset($_GET['search']) && isset($_GET['filter'])){
                // Check if search and filter are not empty
                if(!empty($_GET['search']) && !empty($_GET['filter'])){
                    $search = '%' . $_GET['search'] . '%';
                    $filter = '%' . $_GET['filter'] . '%';
                    $sql = "SELECT title, content, image, post_id FROM post WHERE (title LIKE :search OR content LIKE :search) AND category LIKE :filter";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(':search', $search);
                    $statement->bindParam(':filter', $filter);
                } elseif(!empty($_GET['search']) && empty($_GET['filter'])){
                    $search = $_GET['search'];
                    $sql = "SELECT title, content, image, post_id FROM post WHERE title LIKE :search OR content LIKE :search";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(':search', $search);
                }elseif(!empty($_GET['filter']) && empty($_GET['search'])){
                    $filter = $_GET['filter'];
                    $sql = "SELECT title, content, image, post_id FROM post WHERE category LIKE :filter";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(':filter', $filter);
                }
                else{
                    $sql = "SELECT title, content, image, post_id FROM post";
                    $statement = $pdo->prepare($sql);
                }
            }else{
                echo "Error: Search and filter are not set";
            }
        }else{
            echo "Error: Request method is not GET";
        }
        
                   
        $statement->execute();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $title = $row['title'];
            $post_id = $row['post_id'];
            echo '<article class="post">';
        }
        
?>

<h2><a href="view_post.php?post_id=<?=$post_id?>">Post <?=$post_id?>: <?=$title?></a></h2>

<?php
            echo '<p>' . nl2br(htmlspecialchars($row['content'])) . '</p>';
            if (!empty($row['image'])) {
                echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '" style = "width: 75%; height: auto;"/>';
            }
            echo '</article>';
        
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
?>


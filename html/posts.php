<!-- posts.php -->
<!-- Posts content will be loaded dynamically -->
<div class="posts" style="width: 75%; margin: 1em auto;">
    <h1>Welcome to Our Forum!</h1>
    <p>Here are some interesting posts:</p>
    <?php
        include 'connect.php';

        try {
            // check if post or get
            if ($_SERVER['REQUEST_METHOD'] == "GET"){
                // Check if search and filter are set
                if(isset($_GET['search']) && isset($_GET['filter'])){
                    // Check if search and filter are not empty
                    if(!empty($_GET['search']) && !empty($_GET['filter'])){
                        $search = '%' . strtolower($_GET['search']) . '%';
                        $filter = '%' . $_GET['filter'] . '%';
                        $sql = "SELECT title, content, image, post_id, category_id FROM post WHERE (LOWER(title) LIKE :search OR LOWER(content)  LIKE :search) AND category_id LIKE :filter";
                        $statement = $pdo->prepare($sql);
                        $statement->bindParam(':search', $search);
                        $statement->bindParam(':filter', $filter);
                    } elseif(!empty($_GET['search']) && empty($_GET['filter'])){
                        $search = '%' . strtolower($_GET['search']) . '%';
                        $sql = "SELECT title, content, image, post_id, category_id FROM post WHERE LOWER(title) LIKE :search OR LOWER(content)  LIKE :search";
                        $statement = $pdo->prepare($sql);
                        $statement->bindParam(':search', $search);
                    }elseif(!empty($_GET['filter']) && empty($_GET['search'])){
                        $filter = $_GET['filter'];
                        $sql = "SELECT title, content, image, post_id, category_id FROM post WHERE category_id LIKE :filter";
                        echo $filter;
                        $statement = $pdo->prepare($sql);
                        $statement->bindParam(':filter', $filter);
                    }
                    else{
                        $sql = "SELECT title, content, image, post_id, category_id FROM post";
                        $statement = $pdo->prepare($sql);
                    }
                }else{
                        $sql = "SELECT title, content, image, post_id, category_id FROM post";
                        $statement = $pdo->prepare($sql);
                }
            }else{
                echo "Error: Request method is not GET";
            }
            $statement->execute();

            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $title = $row['title'];
                $post_id = $row['post_id'];
                echo '<article class="post" style="width:90%; margin: 2em auto;">';
                echo "<h2><a class='post_id' href='view_post.php?post_id={$post_id}'>Post {$post_id}: {$title}</a></h2>";
                $category_id = $row['category_id'];
                echo 'Category id: '.$category_id.'';
                echo '<p>' . nl2br(htmlspecialchars($row['content'])) . '</p>';
                if (!empty($row['image'])) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '" style = "width: 40%; height: auto;"/>';
                }
                echo '</article>';
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    ?>
</div>

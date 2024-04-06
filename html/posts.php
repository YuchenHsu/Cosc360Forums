<!-- posts.php -->
<!-- Posts content will be loaded dynamically -->
<div class="posts">
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
                        $sql = "SELECT title, content, image, post_id, u.username, profile_pic, pinned, upvotes, downvotes, p.category_id AS category_id, c.name AS category_name FROM post AS p JOIN category AS c ON p.category_id = c.id JOIN user AS u ON p.username = u.username WHERE (LOWER(title) LIKE :search OR LOWER(content)  LIKE :search) AND category_id = :filter ORDER BY upvotes DESC, p.created_at DESC";
                        $statement = $pdo->prepare($sql);
                        $statement->bindParam(':search', $search);
                        $statement->bindParam(':filter', $filter);
                    } elseif(!empty($_GET['search']) && empty($_GET['filter'])){
                        $search = '%' . strtolower($_GET['search']) . '%';
                        $sql = "SELECT title, content, image, post_id, u.username, profile_pic, pinned, upvotes, downvotes, p.category_id AS category_id, c.name AS category_name FROM post AS p JOIN category AS c ON p.category_id = c.id JOIN user AS u ON p.username = u.username WHERE LOWER(title) LIKE :search OR LOWER(content)  LIKE :search ORDER BY upvotes DESC, p.created_at DESC";
                        $statement = $pdo->prepare($sql);
                        $statement->bindParam(':search', $search);
                    }elseif(!empty($_GET['filter']) && empty($_GET['search'])){
                        $filter = $_GET['filter'];
                        $sql = "SELECT title, content, image, post_id, u.username, profile_pic, pinned, upvotes, downvotes, p.category_id AS category_id, c.name AS category_name FROM post AS p JOIN category AS c ON p.category_id = c.id JOIN user AS u ON p.username = u.username WHERE category_id LIKE :filter ORDER BY upvotes DESC, p.created_at DESC";
                        $statement = $pdo->prepare($sql);
                        $statement->bindParam(':filter', $filter);
                    }
                    else{
            $sql = "SELECT title, content, image, post_id, u.username, profile_pic, pinned, upvotes, downvotes, p.category_id AS category_id, c.name AS category_name FROM post AS p JOIN category AS c ON p.category_id = c.id JOIN user AS u ON p.username = u.username ORDER BY pinned DESC, upvotes DESC, p.created_at DESC";
                        $statement = $pdo->prepare($sql);
                    }
                }else{
            $sql = "SELECT title, content, image, post_id, u.username, profile_pic, pinned, upvotes, downvotes, p.category_id AS category_id, c.name AS category_name FROM post AS p JOIN category AS c ON p.category_id = c.id JOIN user AS u ON p.username = u.username ORDER BY pinned DESC, upvotes DESC, p.created_at DESC";
                    $statement = $pdo->prepare($sql);
                }
            }else{
                echo "Error: Request method is not GET";
            }
            $statement->execute();

            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $title = $row['title'];
                $post_id = $row['post_id'];
                $class = "post";
                if($row['pinned'] == 1){
                    $class = "pinned post";
                }
                echo '<article class="'. $class . '">';
                if($row['pinned'] == 1){
                    echo "<img class='pinIcon'src='../images/social/pin_icon.png' alt='Pinned Post'>";
                }
                else{
                    $up = $row['upvotes'];
                    $down = $row['downvotes'];
                    $total = $up - ceil($down / 2);
                    echo "<p class='vote'>Score: {$total}</p>";
                }
                echo("<div class='userinfo'>"); 
                if (!empty($row['profile_pic'])) {
                echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['profile_pic'] ) . '"alt = "' . $row['username'] . ' Profile Pic", class="prof_pic"/>';
                }
                echo("<span class='username'>" . $row['username'] . "</span>");
                echo("</div>"); 
                echo "<a class='post_id' href='post_detail.php?post_id={$post_id}'>Post {$post_id}: {$title}</a>";
                $category = $row['category_name'];
                // display the username of the post and make it link to their profile
                // echo '<p>Posted by: <a class="post_username" name=' . $row['username'] . ' value=' . $row['username'] . ' href="profile.php?username=' . $row['username'] . '">' . $row['username'] . '</a></p>';
                echo '<b>Category: '.$category.'</b>';
                echo '<p>' . nl2br(htmlspecialchars($row['content'])) . '</p>';
                if (!empty($row['image'])) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '"alt = "Post' . $title . ' Image Content"/>';
                }
                echo '</article>';
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    ?>
</div>

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
                echo "<a class='post_id' href='post_detail.php?post_id={$post_id}'>{$title}</a>";

                if($row['pinned'] != 1){
                    echo("<div class='userinfo'>");
                    if (!empty($row['profile_pic'])) {
                        echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['profile_pic'] ) . '"alt = "' . $row['username'] . ' Profile Pic", class="prof_pic"/>';
                    } else {
                        echo '<img src="../images/default_prof_pic.png" alt = "' . $row['username'] . ' Profile Pic", class="prof_pic"/>';
                    }

                    echo("<span class='username'>" . $row['username'] . "</span>");
                    echo("</div><br>");

                }

                $category = $row['category_name'];
                // display the username of the post and make it link to their profile
                echo '<b>Category: '.$category.'</b>';
                // echo '<p class="content">' . nl2br(htmlspecialchars($row['content'])) . '</p>';
                $content = nl2br(htmlspecialchars($row['content']));
                echo '<p class="content" id="content-'.$post_id.'">' . $content . '</p>';
                // if the length of the content is greater than 100 characters, display the expand button
                if (strlen($row['content']) > 100) {
                    echo '<button class="expand-collapse" id="expand-'.$post_id.'" onclick="expandContent('.$post_id.')"">Expand</button></br>';
                }
                echo '<button class="expand-collapse" id="collapse-'.$post_id.'" onclick="collapseContent('.$post_id.')" style="display: none;">Collapse</button></br>';
                if (!empty($row['image'])) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '" alt="post image"/>';
                }
                echo '</article>';
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    ?>

    <script>
        function expandContent(post_id) {
            document.getElementById('content-'+post_id).style.webkitLineClamp = 'unset';
            document.getElementById('expand-'+post_id).style.display = 'none';
            document.getElementById('collapse-'+post_id).style.display = 'block';
        }

        function collapseContent(post_id) {
            document.getElementById('content-'+post_id).style.webkitLineClamp = '5';
            document.getElementById('expand-'+post_id).style.display = 'block';
            document.getElementById('collapse-'+post_id).style.display = 'none';
        }

    </script>
</div>

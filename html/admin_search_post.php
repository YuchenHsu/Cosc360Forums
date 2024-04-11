<!-- search_posts for users to disable or view -->
<?php
    try{
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            // Connect to the database
            include 'connect.php';
            // check for null values
            if(isset($_POST['search_posts'])){
                // check for empty values
                if(!empty($_POST['search_posts'])){
                    // search_posts for users
                    $search_posts = '%' . strtolower($_POST['search_posts']) . '%';
                    $sql = "SELECT post_id, title, content, reported FROM post WHERE LOWER(title) LIKE :search_posts OR LOWER(content) LIKE :search_posts";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(':search_posts', $search_posts);
                    $statement->execute();
                    // display results
                    while($row = $statement->fetch()){
                        $title = $row['title'];
                        $post_id = $row['post_id'];
                        $content = $row['content'];
                        if($row['reported'] == 1){
                           $reported = "Reported";
                        }else{
                            $reported = "Not Reported";
                        }

                        echo '<article class="post" style="width: 70%; padding:0.5em;">';
                        echo'<input type="checkbox" id="' . $post_id . '" name= selected[] value='. $post_id . '></input>';
                        echo'<a href="post_detail.php?post_id=' . $post_id . '" class="post_id" style="font-size: 1.2em;">' . $title . '</a>';
                        echo'<span>' . $reported . '</span>';
                        echo'<p>' . $content .'</p>';
                        echo '<button class="edit_post" id = '.$row['post_id'].'>Edit Post</button>';
                        echo '</article>';
                    }
                }else{
                    echo "Please enter a search_posts term empty";
                    // echo "empty search_posts term"
                }
            }else{
                echo "Please enter a search_posts term null";
                // echo "null search_posts term"
            }
        }else{
            echo "Not a post request";
        }
    }catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }finally{
        $pdo = null;
    }
?>

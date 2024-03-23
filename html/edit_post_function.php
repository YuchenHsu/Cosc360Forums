<?php
    include 'connect.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['category_id']) && isset($_POST['title']) && isset($_POST['post_body'])) {
            if (!empty($_POST['category_id']) && !empty($_POST['title']) && !empty($_POST['post_body'])) {
                $category_id = $_POST['category_id'];
                $title = $_POST['title'];
                $post_body = $_POST['post_body'];
                $username = $_SESSION['username'];

                if (isset($_FILES['post_image'])) {
                    $post_image = file_get_contents($_FILES['post_image']['tmp_name']);
                } else {
                    $post_image = null;
                }

                $sql = "UPDATE post SET category_id = :category_id, title = :title, content = :post_body, username = :username, image = :post_image WHERE post_id = :post_id";
                $statement = $pdo->prepare($sql);
                $statement->bindParam(':category_id', $category_id);
                $statement->bindParam(':title', $title);
                $statement->bindParam(':post_body', $post_body);
                $statement->bindParam(':username', $username);
                $statement->bindParam(':post_image', $post_image);
                $statement->execute();
                header("Location: index.php");
            } else {
                echo "Error: Category, title, and post body cannot be empty.";
            }
        } else {
            echo "Error: Category, title, and post body not set.";
        }
    } else {
        echo "Error: Request method is not POST.";
    }
?>

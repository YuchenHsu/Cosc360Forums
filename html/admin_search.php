<!-- search_users for users to disable or view -->
<?php
$connString = "mysql:host=localhost; dbname=forums";
$user = "root";
$pass = "";
    try{

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            // Connect to the database
            $pdo = new PDO($connString, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // check for null values
            if(isset($_POST['search_users'])){
                // check for empty values
                if(!empty($_POST['search_users'])){
                    // search_users for users
                    $search_users = '%' . strtolower($_POST['search_users']) . '%';
                    $sql = "SELECT username FROM user WHERE LOWER(username) LIKE :search_users";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(':search_users', $search_users);
                    $statement->execute();
                    // display results
                    while($row = $statement->fetch()){
                        echo "<div class='user' style='width: 100%; height: auto; margin: 1em;'>";
                        echo "<p>" . $row['username'] . "</p>";
                        echo "<button style='display: inline;'><a href='profile.php?username={$row['username']}' class='searched_user' style='text-decoration: none; color: inherit;'>View</a></button>";
                        echo "<input type=checkbox id=" . $row['username'] . "name= selected[] value=" . $row['username'] ."></input>";
                    }

                }else{
                    echo "Please enter a search_users term empty";
                    // echo "empty search_users term"
                }
            }else{
                echo "Please enter a search_users term null";
                // echo "null search_users term"
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

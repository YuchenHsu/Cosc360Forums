<!-- search_users for users to disable or view -->
<?php
    try{
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            // Connect to the database
            include 'connect.php';
            // check for null values
            if(isset($_POST['search_users'])){
                // check for empty values
                if(!empty($_POST['search_users'])){
                    // search_users for users
                    $search_users = '%' . strtolower($_POST['search_users']) . '%';
                    $sql = "SELECT username, reported, disabled FROM user WHERE LOWER(username) LIKE :search_users OR LOWER(email) LIKE :search_users";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(':search_users', $search_users);
                    $statement->execute();
                    // display results
                    while($row = $statement->fetch()){
                        echo "<div class='user' style='width: auto; height: auto; margin: 1em; border: 1px solid black;'>";
                        if($row['reported'] == 1){
                            $reported = "Reported";
                        }else{
                            $reported = "Not Reported";
                        }
                        if($row['disabled'] == 1){
                            $disabled = "Disabled";
                        }else{
                            $disabled = "Not Disabled";
                        }
                        echo "<p>" . $row['username'] ."-". $reported . "-" . $disabled . "</p>";
                        echo "<a href='profile.php?username={$row['username']}' class='searched_user' style='text-decoration: none; color: inherit;'><button style='display: inline;'>View</button></a>";
                        echo "<input type=checkbox id=" . $row['username'] . "name= selected[] value=" . $row['username'] ."></input>";
                        echo "</div>";
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

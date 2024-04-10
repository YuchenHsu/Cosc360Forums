<div id="navbar">
    <div class="topnav">
        <a href="#posts" id="post-btn" class="active" data-page="posts.php">Home</a>
        <a href="#create_post" id="create_post_btn" class="active" data-page="create_post.php">Create Post</a>
        <form id="search_form">
            <label for="search" style="display: none;">Search:</label>
            <input id="search" type="text" name="search" placeholder="search">
            <select name="filter" id="filter">
                <option value="">All</option>
                <?php
                    session_start();
                    include "connect.php";
                    $sql = "SELECT * FROM category";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();

                    $categories = $stmt->fetchAll();

                    foreach ($categories as $category) {
                        echo "<option value=\"{$category['id']}\">{$category['name']}</option>";
                    }
                ?>
            </select>
            <a href="#search" class="active" id="search-btn" data-page="search.php">
            <button id="search_btn" type="submit">Search</button>
            </a>
        </form>
        <div class="topnav-right">
            <div id="notification-icon">
                <?php
                    if(isset($_SESSION['username'])){
                        $sql = "SELECT COUNT(notification_id) AS total FROM notification WHERE username = :username AND unread = 1";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue(':username', $_SESSION['username']);
                        $stmt->execute();
                        $notification = $stmt->fetch();
                        $count = $notification['total'];
                        echo '<a href="#notification" class="active" id="notif-btn" data-page="notification.php">Notification<span class="badge">' . $count . '</span></a>';
                    }
                    else{
                        echo '<a href="#notification" class="active" id="notif-btn" data-page="notification.php">Notification</a>';
                    }
                ?>
            </div>
            <div class="dropdown">
                <a class = "active">
                    <?php
                        if (isset($_SESSION['username'])) {
                            echo $_SESSION['username'] . ' &#9660';
                        } else {
                            echo 'User' . ' &#9660';
                        }
                    ?>
                </a>
                <div class="dropdown-content">
                    <?php
                        if (isset($_SESSION['username'])) {
                            echo '<a href="#profile" id="profile-btn" data-page="profile.php">Profile</a>';
                            $sql = "SELECT * FROM user WHERE username = :username";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindValue(':username', $_SESSION['username']);
                            $stmt->execute();
                            $user = $stmt->fetch();
                            if ($user['admin'] == 1) {
                                echo '<a href="#admin" id="admin-btn" data-page="admin.php">Admin</a>';
                            } else {
                                echo '<a href="#admin" id="admin-btn" data-page="admin.php" style="display: none;">Admin</a>';
                            }
                        }
                    ?>

                    <?php
                        if (isset($_SESSION['username'])) {
                            echo '<a href="#logout" data-page="logout.php">Logout</a>';
                        } else {
                            echo '<a href="#register" id="user-btn" data-page="register.php">Register</a>';
                            echo '<a href="#login" id="login-btn" data-page="login.php">Login</a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div id="breadcrumbs">
        <a href='base.php#'>Home</a> > Posts
    </div>
</div>

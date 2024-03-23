<div id="navbar">
    <div class="topnav">
        <!-- <a href="base.php" id="home-btn" class="active">Home</a> -->
        <a href="#posts" id="post-btn" class="active" data-page="posts.php">Home</a>
        <a href="#create_post" id="create_post_btn" class="active" data-page="create_post.php">Create Post</a>
        <form id="search_form">
            <div style="display: flex;">
            <input id="search" type="text" name="search" style="margin:0.4em; height: 2em;">
            <select name="filter" id="filter" style="height: 3.5em;margin:0.6em; ">
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
            <a href="#search" class="active" id="search-btn" style="margin: auto 0; padding:0;" data-page="search.php">
            <button id="search_btn" type="submit" style="background-color: #ff6f59">Search</button>
            </a>
            </div>
        </form>
        <div class="topnav-right">
            <a href="#notification" class="active" id="notif-btn" data-page="notification.php">Notification</a>
            <div class="dropdown">
                <a class = "active">
                    <?php
                        if (isset($_SESSION['username'])) {
                            // User is logged in
                            echo $_SESSION['username'] . ' &#9660';
                        } else {
                            // User is not logged in
                            echo 'User' . ' &#9660';
                        }
                    ?>
                    <!-- $_SESSION['username'] &#9660; -->
                </a>
                <div class="dropdown-content">
                    <?php
                        if (isset($_SESSION['username'])) {
                            // User is logged in
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
                            // User is logged in
                            echo '<a href="#logout" data-page="logout.php">Logout</a>';
                        } else {
                            // User is not logged in
                            echo '<a href="#register" id="user-btn" data-page="register.php">Register</a>';
                            echo '<a href="#login" id="login-btn" data-page="login.php">Login</a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- generate a breadcrumbs for this website -->
    <div id="breadcrumbs">
        <a href='base.php#'>Home</a> > Posts
    </div>
</div>

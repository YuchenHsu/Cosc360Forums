<div id="navbar">
    <div class="topnav">
        <!-- <a href="base.php" id="home-btn" class="active">Home</a> -->
        <a href="#posts" id="post-btn" class="active" data-page="posts.php">Home</a>
        <a href="#create_post" id="create_post_btn" class="active" data-page="create_post.php">Create Post</a>
        <a href="#search" class="active" id="search-btn" data-page="search.php">Search</a>
        <div class="topnav-right">
            <a href="#" class="active" id="notif-btn" data-page="notification.php">Notification</a>
            <div class="dropdown">
                <a class = "active">
                    <?php
                        session_start();
                        if (isset($_SESSION['username'])) {
                            // User is logged in
                            echo $_SESSION['username'] . ' &#9660';
                        } else {
                            // User is not logged in
                            echo 'User';
                        }
                    ?>
                    <!-- $_SESSION['username'] &#9660; -->
                </a>
                <div class="dropdown-content">
                    <?php
                        if (isset($_SESSION['username'])) {
                            // User is logged in
                            echo '<a href="#profile" id="profile-btn" data-page="profile.php">Profile</a>';
                        }
                    ?>
                    <!-- <a href="#user" id="profile-btn" data-page="profile.php">Profile</a> -->
                    <a href="#admin" id="admin-btn" data-page="admin.php">Admin</a>
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
</div>

<div class="topnav">
    <a href="base.php" id="home-btn" class="active">Home</a>
    <a href="#posts" id="post-btn" class="active">Posts</a>
    <a href="#" id="create_post_btn" class="active">Create Post</a>
    <a href="#search" class="active" id="search-btn">Search</a>
    <div class="topnav-right">
        <a href="#" class="active" id="notif-btn">Notification</a>
        <div class="dropdown">
            <a class = "active">
                User &#9660;
            </a>
            <div class="dropdown-content">
                <a href="#user" id="profile-btn">Profile</a>
                <a href="#admin" id="admin-btn">Admin</a>
                <a href="#register"  id="user-btn">Register</a>
                <a href="#logout">Logout</a>
        </div>
        </div>
    </div>
</div>
<form id="login-form" class="form-container" style="display: none;">
    <button id="login-btn" type="button">Login</button>
    <button id="register-btn" type="button">Register</button>
    <div class="username">
        <label for="username">Username: </label>
        <input id="username" type="text" name="username" required>
    </div>
    <div class="password">
        <label for="password">Password: </label>
        <input id="password" type="password" name="password" required>
    </div>
    <div class="remember" style="display: none;">
        <input id="remember" type="checkbox" name="remember">
        <label for="remember">Remember me</label>
    </div>
    <button id="login-submit" type="submit">Submit</button>
</form>
<!-- Make a invisible register form that's toggled by the js -->
<form id="register-form" class="form-container" style="display: none;">
    <button id="login-btn-1" type="button">Login</button>
    <button id="register-btn" type="button">Register</button>
    <div class="full_name">
        <label for="full_name">Full Name: </label>
        <input id="full_name" type="text" name="full_name" required>
    </div>
    <div class="email">
        <label for="email">Email: </label>
        <input id="email" type="email" name="email" required>
    </div>
    <div class="username">
        <label for="reg_username">Username: </label>
        <input id="reg_username" type="text" name="username" required>
    </div>
    <div class="password">
        <label for="reg_password">Password: </label>
        <input id="reg_password" type="password" name="password" required>
    </div>
    <div class="confirm">
        <label for="confirm_password">Confirm Password:</label>
        <input id="confirm_password" type="password" name="password" required>
    </div>
    <div class="profile_pic">
        <label for="profile_pic">Profile Picture: </label>
        <input type="file" name="profile_pic" id="profile_pic" accept="image/png, image/jpeg">
    </div>
    <br>
    <button id="register-submit" type="submit">Submit</button>
</form>

<!-- Make a invisible Search bar that's toggled by the js -->
<form id="search-form" class="form-container" style="display: none;">
    <a>
        <h3>Search by:</h3>
        <input id="search" type="radio" name="search" value="user" required>
        <label for="search"><a>User</a></label>
        <input id="search" type="radio" name="search" value="post" required>
        <label for="search"><a>Post</a></label>
    </a>
    <input id="search" type="text" name="search" required>
    <button id="search_btn" type="submit">Search</button>
</form>

<!-- Make a invisible notification page that's toggled by the js -->
<div id="notification" class="form-container" style="display: none;">
    <h3>Notification</h3>
    <p>Notification 1</p>
    <p>Notification 2</p>
    <p>Notification 3</p>
</div>

<!-- make an invisible error message for login -->
<div id="error-login" class="form-container" style="display: none;">
    <h3>Error</h3>
    <p>Invalid username or password</p>
</div>
<!-- make an invisible error message for register -->
<div id="error-register" class="form-container" style="display: none;">
    <h3>Error</h3>
    <p>Invalid username or password</p>
</div>

<!-- make an invisible profile page that's toggled by the js -->
<div id="profile" class="form-container" style="display: none;">
    <div class="profile-container">
        <div class="profile">
            <!-- Profile section -->
            <img class="profile-pic" src="../images/social/twitter_16.png" alt="Profile Picture">
            <h2>User Profile</h2>
            <p><strong>Username:</strong> <!-- Add username here --></p>
            <p><strong>Email:</strong> <!-- Add email here --></p>
        </div>
        <div class="profile-posts">
            <!-- Posts section -->
            <h2 class="profile-posts">Posts</h2>
            <!-- Add your posts here -->
        </div>

    </div>
</div>
<div id="admin">
    <div id="sidebar" style="display: none;">
        <li><a href="#moderating" id="mod-btn">Moderating</a></li>
        <li><a href="#users" id="mod-users-btn">Users</a></li>
        <li><a href="#analytics" id="mod-analytics-btn">Analytics</a></li>
        <li><a href="#reports" id="mod-reports-btn">Reports</a></li>
    </div>
    <div id="moderating" style="display: none">
        <h2>Moderating</h2>
        <p>Here you can moderate the forums. You can delete posts, ban users, and more.</p>
        <table>
            <tr>
                <th>Reported Posts</th>
                <th>Reported Users</th>
                <th>Conflicts</th>
            </tr>
            <tr>
                <td>Post 1<button>Remove</button></td>
                <td>User 1<button>Disable</button></td>
                <td>Conflict 1</td>
        </table>
    </div>
    <div id="mod-user" style="display: none">
        <h2>Users</h2>
        <p>Here you can view all the users and their information. You can also ban users.</p>
        <form method="POST">
            <input type="text" name="search" placeholder="Search users" id="search_users">
            <button type="submit" id="search_users_submit">Search</button>
        </form>
        <div class="user_disp">
            <p>User 1</p>
            <button>View</button>
            <button>Disable</button>
        </div>
    </div>
    <div id="mod-analytics" style="display: none">
        <h2>Analytics</h2>
        <p>Here you can view the analytics of the forums. You can see how many users are active, how many posts are made, and more.</p>
        <div class="container">
            <h4>Up Votes to Down Votes:</h4>
            <p>53:20</p>
            <h4>Daily Users Logged In:</h4>
            <p>30%</p>
            <h4>Top Post</h4>
        </div>
    </div>
    <div id="mod-reports" style="display: none">
        <h2>Reports</h2>
        <p>Here you can view the reports for the forum.</p>
        <figure>
            <img src="../images/posts.png" alt="New Users Over Time">
            <figcaption>New Users Over Time</figcaption>
        </figure>
        <figure>
            <img src="../images/posts.png" alt="Posts Over Time">
            <figcaption>Posts Over Time</figcaption>
        </figure>
    </div>    
    <div id="create_post" style="display: none">
        <form class="create_post form-container" action="new_post.php" method="POST" id="create_post_form" enctype="multipart/form-data">
            <fieldset>
                <legend>Create your post:</legend>
                <label for="title">Post title: <input required type="text" name="title" id="title"></label>
                <br>
                <label for="post_body">Post body:</label>
                <textarea required rows="10" cols="60" placeholder="Insert your post text here:" id="post_body" name="post_body"></textarea>
                <!-- below input accepts png and jpeg files -->
                <br>
                <label for="post_image">Insert image here: <input type="file" name="post_image" id="post_image" accept="image/png, image/jpeg"></label>
                <input type="submit" value="submit" id="new_post_submit">
            </fieldset>
        </form>
    </div>
</div>

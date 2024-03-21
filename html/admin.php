<div id="admin">
    <div id="sidebar" style="display: none;">
        <li><a href="#moderating" id="mod-btn">Moderating</a></li>
        <li><a href="#users" id="mod-users-btn">Users</a></li>
        <li><a href="#analytics" id="mod-analytics-btn">Analytics</a></li>
        <li><a href="#reports" id="mod-reports-btn">Reports</a></li>
    </div>
    <div id="moderating" style="display: none;">
        <h2>Moderating</h2>
        <p>Here you can moderate the forums. You can delete posts, ban users, and more.</p>
        <!-- <table>
            <tr>
                <th>Reported Posts</th>
                <th>Reported Users</th>
                <th>Conflicts</th>
            </tr>
            <tr>
                <form id="reported_posts_form"><td id="reported_posts"></td></form>
                <form id="reported_users_posts"><td id="reported_users"></td></form>
                <form id="conflicts_form"><td id="conflicts"></td></form>
            </tr>
        </table> -->
        <form id="reported_posts_form" method="POST">
        <div id="reported_posts_container" style="float:left; background-color:#b0bbd7; border-style: solid;">
            <h3>Reported Posts</h3>
            <button type="submit" id="remove_post">Remove Post</button>
            <div id="reported_posts"></div>
        </div>
        </form>
        <form id="reported_users_form" method="POST">
        <div id="reported_users_container" style="float:left; background-color:#b0bbd7; border-style: solid;">
            <h3>Reported Users</h3>
            <button type="submit" id="ban_user">Ban User</button>
            <div id="reported_users"></div>
        </div>
        </form>
        <form id="conflicts_form" method="POST">
        <div id="conflicts_container"style="float:left; background-color:#b0bbd7; border-style: solid;">
            <h3>Conflicts</h3>
            <button type="submit" id="resolve_conflict">Resolve Conflict</button>
            <div id="conflicts"></div>
        </div>
        </form>

    </div>
    <div id="mod-user" style="display: none">
        <h2>Users</h2>
        <p>Here you can view all the users and their information. You can also ban users.</p>
        <form method="POST" id="search_users_form">
            <input type="text" name="search_users" placeholder="Search users" id="search_users">
            <button type="submit" id="search_users_submit">Search</button>
        </form>
        <div class="user_disp" id="user_disp">
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
</div>
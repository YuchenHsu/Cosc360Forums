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
                <td id="reported_posts"></td>
                <td id="reported_users"></td>
                <td>Conflict 1</td>
            </tr>
        </table>
    </div>
    <div id="mod-user" style="display: none">
        <h2>Users</h2>
        <p>Here you can view all the users and their information. You can also ban users.</p>
        <form method="POST" id="search_users_form">
            <input type="text" name="search_users" placeholder="Search users" id="search_users">
            <button type="submit" id="search_users_submit">Search</button>
        </form>
        <div class="user_disp" id="user_disp">
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
</div>
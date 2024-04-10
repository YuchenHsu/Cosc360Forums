<div id="mod-user">
    <span id="admin_header">
        <h2>Users</h2>
        <p>Here you can view all the users and their information. You can also ban users.</p>
    </span>
    <form method="POST" id="search_users_form">
        <label for="search_users" style="color:white;" >Search users:</label>
        <input type="text" name="search_users" placeholder="Search users" id="search_users">
        <button type="submit" id="search_users_submit">Search</button>
    </form>
    <form id="reported_users_form" method="POST">
        <button type="submit" id="enable_user_submit">Enable</button>
        <button type="submit" id="disable_user_submit">Disable</button>
        <div class="user_disp" id="user_disp">
        </div>
    </form>
</div>

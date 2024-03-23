<div id="moderating">
    <span id="admin_header">
        <h2>Moderating</h2>
        <p>Here you can moderate the forums. You can delete posts, ban users, and more.</p>
    </span>
    <form id="delete_posts_form" method="POST">
        <div id="reported_posts_container" class="admin_form" >
            <h3>Reported Posts</h3>
            <button type="submit" id="remove_post">Remove Post</button>
            <div id="post_disp"></div>
        </div>
    </form>
    <form id="reported_users_form" method="POST">
        <div id="reported_users_container" class="admin_form" >
            <h3>Reported Users</h3>
            <button type="submit" id="ban_user">Ban User</button>
            <div id="reported_users"></div>
        </div>
    </form>
    <form id="conflicts_form" method="POST">
        <div id="conflicts_container" class="admin_form" >
            <h3>Conflicts</h3>
            <button type="submit" id="resolve_conflict">Resolve Conflict</button>
            <div id="conflicts"></div>
        </div>
    </form>
</div>
<!-- INSERT INTO `conflict`(`username1`, `username2`, `info`, `resolved`) VALUES ('Ethanh0000','Ethanh1111','info', FALSE) -->

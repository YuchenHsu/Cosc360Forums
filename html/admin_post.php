<div id="mod-post">
    <span id="admin_header">
        <h2>Posts</h2>
        <p>Here you can view all the posts and their information. You can also ban posts.</p>
    </span>
    <form method="POST" id="search_posts_form">
        <label for="search_posts" style="color:white;" >Search posts:</label>
        <input type="text" name="search_posts" placeholder="Search posts" id="search_posts">
        <button type="submit" id="search_posts_submit">Search</button>
    </form>
    <form id="delete_posts_form" method="POST">
        <button type="submit" id="delete_post_submit" style="float:right;">Delete</button>
        <div class="post_disp" id="post_disp" style="clear:both;">
        </div>
    </form>
</div>

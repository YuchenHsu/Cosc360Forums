<div class="topnav">
    <!-- <a href="base.php" id="home-btn" class="active">Home</a> -->
    <a href="#posts" id="post-btn" class="active">Home</a>
    <a href="#create_post" id="create_post_btn" class="active">Create Post</a>
    <a href="#search" class="active" id="search-btn">
        <form id="search_form">
            <div style="display: flex;">
            <input id="search" type="text" name="search" required>
            <input id="filter" type="hidden" name="filter" required>
            <button id="search_btn" type="submit">Search</button>
            </div>
        </form>
    </a>
    <!-- make a dropdown for a filter -->
    <!-- <div class="dropdown">
        <a class = "active">
            Filter &#9660;
        </a>
        <div class="dropdown-content">
            <a href="#new">New</a>
            <a href="#top">Top</a>
            <a href="#hot">Hot</a>
        </div>
    </div> -->
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
    <!-- make a sub top bar under the bar that shows all the categories -->
</div>    
<div id="filter_nav" class="topnav" style="background-color: purple;">
    <a href="#all" id="all">All</a>
    <a href="#news" id="news">News</a>
    <a href="#sports"id="sports">Sports</a>
    <a href="#travel"id="travel">Travel</a>
    <a href="#dance"id="dance">Dance</a>
    <a href="#music"id="music">Music</a>
    <a href="#food"id="food">Food</a>
</div>
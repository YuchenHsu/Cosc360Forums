<!-- Make a invisible Search bar that's toggled by the js -->
<form id="search-form" class="form-container" style="display: none;">

    <h3>Search by:</h3>
    <label for="user_search"><a>User</a></label>
    <input id="user_search" type="radio" name="search" value="user" required>
    <label for="post_search"><a>Post</a></label>
    <input id="post_search" type="radio" name="search" value="post" required>

    <input id="search" type="text" name="search" required>
    <button id="search_btn" type="submit">Search</button>
</form>



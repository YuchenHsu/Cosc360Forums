<!-- Make a invisible Search bar that's toggled by the js -->
<form id="search-form" class="form-container" style="display: none;">
    <a>
        <h3>Search by:</h3>
        <input id="search" type="radio" name="search" value="user" required>
        <label for="search"><a>User</a></label>
        <input id="search" type="radio" name="search" value="post" required>
        <label for="search"><a>Post</a></label>
    </a>
    <input id="search-bar" type="text" name="search" required>
    <button id="search-btn" type="submit">Search</button>
</form>

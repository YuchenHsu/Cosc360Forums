// client side security for searching posts
$("#search-btn").on("click", function (event) {
    event.preventDefault();
    const search = $("#search-bar").value;
    if (search === "" || search === null) {
        alert("Please enter a search term.");
    } else {
        this.submit();
    }
});
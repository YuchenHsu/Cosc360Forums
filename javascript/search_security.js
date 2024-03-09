// client side security for searching posts
$("search-btn").on("click", function (event) {
    event.preventDefault();
    const search = document.getElementById("search-bar").value;
    if (search === "" || search === null) {
        alert("Please enter a search term.");
    } else {
        this.submit();
    }
});
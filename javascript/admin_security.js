// client side validation for admin page forms
$("search_users_submit").on("click", function (event) {
    event.preventDefault();
    const search = document.getElementById("search_users").value;
    if (search === "" || search === null) {
        alert("Please enter a username to search for.");
    } else {
        this.submit();
    }
});
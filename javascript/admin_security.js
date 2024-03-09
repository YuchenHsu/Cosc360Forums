// client side validation for admin page forms
document.getElementById("search_users_submit").onsubmit = function (event) {
    event.preventDefault();
    const search = document.getElementById("search_users").value;
    if (search === "" || search === null) {
        alert("Please enter a username to search for.");
    } else {
        this.submit();
    }
}
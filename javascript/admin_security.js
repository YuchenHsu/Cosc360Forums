// client side validation for admin page forms
document.getElementById("search-users-submit").onsubmit = function (event) {
    event.preventDefault();
    const search = document.getElementById("search-users").value;
    if (search === "" || search === null) {
        alert("Please enter a username to search for.");
    } else {
        this.submit();
    }
}
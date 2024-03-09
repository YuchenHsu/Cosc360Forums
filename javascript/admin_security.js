// client side validation for admin page forms
const adminBtn = $("search_users_submit");
adminBtn.on("click", function (event) {
    event.preventDefault();
    const search = $("search_users").val();
    if (search === "" || search === null) {
        alert("Please enter a username to search for.");
    } else {
        this.submit();
    }
});
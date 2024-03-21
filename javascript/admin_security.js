// client side validation for admin page forms
$("#user_search_form").submit(function (event) {
    event.preventDefault();
    const search = $("#search_users").val();
    if (search === "" || search === null) {
        alert("Please enter a username to search for.");
    } else {
        this.submit();
    }
});

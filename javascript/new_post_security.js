// client side validation for new post page forms
$("#new_post_submit").on("click", function (event) {
    event.preventDefault();
    const title = $("#title").value;
    const content = $("#post_body").value;
    if (title === "" || title === null) {
        alert("Please enter a title for your post.");
    } else if (content === "" || content === null) {
        alert("Please enter content for your post.");
    }else {
        this.submit();
    }
});
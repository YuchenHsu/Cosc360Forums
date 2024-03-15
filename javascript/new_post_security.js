// client side validation for new post page forms
$("#create_post_form").submit(function (event) {
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

// client side validation for new post page forms
document.getElementById("new_post_submit").onsubmit = function (event) {
    event.preventDefault();
    const title = document.getElementById("title").value;
    const content = document.getElementById("post_body").value;
    if (title === "" || title === null) {
        alert("Please enter a title for your post.");
    } else if (content === "" || content === null) {
        alert("Please enter content for your post.");
    }else {
        this.submit();
    }
}
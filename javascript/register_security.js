// client side security for register page
$("register-btn").on("click", function (event) {
    event.preventDefault();
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const confirm_password = document.getElementById("confirm_password").value;
    if (username === "" || username === null) {
        alert("Please enter a username.");
    } else if (password === "" || password === null) {
        alert("Please enter a password.");
    } else if (confirm_password === "" || confirm_password === null) {
        alert("Please confirm your password.");
    } else if (password !== confirm_password) {
        alert("Passwords do not match.");
    } else {
        this.submit();
    }
});
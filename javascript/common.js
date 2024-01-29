document.addEventListener("DOMContentLoaded", function () {
    // Toggles everything off
    function toggleOff() {
        const postsContainer = document.querySelector(".posts");
        const searchForm = document.getElementById("search-form");
        const loginForm = document.getElementById("login-form");
        const registerForm = document.getElementById("register-form");
        postsContainer.style.display = "none";
        searchForm.style.display = "none";
        loginForm.style.display = "none";
        registerForm.style.display = "none";
    }

    // Toggle the login form
    function toggleLoginForm() {
        const loginForm = document.getElementById("login-form");
        if (loginForm.style.display === "none") {
            loginForm.style.display = "block";
        } else {
            loginForm.style.display = "none";
        }
    }

    const userBtn = document.getElementById("login-btn-1");
    userBtn.addEventListener("click", function () {
        toggleOff();
        toggleLoginForm();
    });

    const userPageBtn = document.getElementById("user-btn");
    userPageBtn.addEventListener("click", function () {
        toggleOff();
        toggleLoginForm();
    });

    // Keep the function and event listener that handle the login logic
    function handleLogin(event) {
        // Prevent the default form submission behavior
        event.preventDefault();
        // Get the username and password values
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;
        // Check if they match some predefined values
        if (username === "user" && password === "web_dev") {
            // If yes, display a success message and reload the page
            alert("Login successful!");
            window.location.reload();
        } else {
            // If no, display an error message
            alert("Invalid username or password!");
        }
    }

    const loginBtn = document.getElementById("login-btn");
    loginBtn.addEventListener("click", function (event) {
        // Call the login function
        handleLogin(event);
    });

    // Toggles the posts content
    function togglePostsContent() {
        const postsContainer = document.querySelector(".posts");
        if (postsContainer.style.display === "none") {
            postsContainer.style.display = "block";
            fetch("posts.html")
                .then(response => response.text())
                .then(html => {
                    postsContainer.innerHTML = html;
                })
                .catch(error => {
                    console.error("Error loading posts:", error);
                });
        } else {
            postsContainer.style.display = "none";
        }
    }

    const homeBtn = document.getElementById("home-btn");
    homeBtn.addEventListener("click", function () {
        toggleOff();
        togglePostsContent();
    });

    // Toggle the search form
    function toggleSearchForm() {
        const searchForm = document.getElementById("search-form");
        if (searchForm.style.display === "none") {
            searchForm.style.display = "block";
        } else {
            searchForm.style.display = "none";
        }
    }

    const searchBtn = document.getElementById("search-btn");
    searchBtn.addEventListener("click", function () {
        toggleOff();
        toggleSearchForm();
    });

    // Toggles the register form
    function toggleRegisterForm() {
        const registerForm = document.getElementById("register-form");
        if (registerForm.style.display === "none") {
            registerForm.style.display = "block";
        } else {
            registerForm.style.display = "none";
        }
    }

    const registerBtn = document.getElementById("register-btn");
    registerBtn.addEventListener("click", function () {
        toggleOff();
        toggleRegisterForm();
    });
});

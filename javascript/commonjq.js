$(document).ready( function() {
    // Toggles everything off
    function toggleOff() {
        const postsContainer = $( ".posts" );
        const searchForm = $( "#search-form" );
        const loginForm = $( "#login-form" );
        const registerForm = $( "#register-form" );
        const notificationsContainer = $( "#notification" );
        const profileContainer = $( "#profile" );
        postsContainer.css( "display", "none" );
        searchForm.css( "display", "none" );
        loginForm.css( "display", "none" );
        registerForm.css( "display", "none" );
        notificationsContainer.css( "display", "none" );
        profileContainer.css( "display", "none" );
    }



    // Toggle the login form
    function toggleLoginForm() {
        const loginForm = $( "#login-form" );
        if (loginForm.css( "display" ) === "none") {
            loginForm.css( "display", "block" );
        } else {
            loginForm.css( "display", "none" );
            ;
        }
    }

    const userBtn = $( "#login-btn-1" );
    userBtn.on("click", function () {
        toggleOff();
        toggleLoginForm();
    });

    const userPageBtn = $( "#user-btn" );
    userPageBtn.on("click", function () {
        toggleOff();
        toggleLoginForm();
    });

    function toggleErrorLogin() {
        const errorMessages = $( ".error" );
        if (errorMessages.css( "display" ) === "none") {
            errorMessages.css( "display", "block" );
        } else {
            errorMessages.css( "display", "none" );
        }
    }

    function toggleErrorRegister() {
        const errorMessages = $( ".error-register" );
        if (errorMessages.css( "display" ) === "none") {
            errorMessages.css( "display", "block" );
        } else {
            errorMessages.css( "display", "none" );
        }
    }

    // Keep the function and event listener that handle the login logic
    function handleLogin(event) {
        // Prevent the default form submission behavior
        event.preventDefault();
        // Get the username and password values
        const username = $( "#username" ).val();
        const password = $( "#password" ).val();
        // Check if they match some predefined values
        if (username === "user" && password === "web_dev") {
            // If yes, display a success message and reload the page
            alert("Login successful!");
            window.location.reload();
        } else {
            // If no, display an error message
            toggleErrorLogin();
            // alert("Invalid username or password!");
        }
    }

    const loginBtn = $( "#login-submit" );
    loginBtn.on("click", function (event) {
        // Call the login function
        handleLogin(event);
    });

    // Toggles the posts content
    // TODO: need to configure further with jq?
    function togglePostsContent() {
        const postsContainer = $( ".posts" );
        if (postsContainer.css( "display" ) === "none") {
            postsContainer.css( "display", "block" );
            fetch("posts.html")
                .then(response => response.text())
                .then(html => {
                    postsContainer.innerHTML = html;
                })
                .catch(error => {
                    console.error("Error loading posts:", error);
                });
        } else {
            postsContainer.css( "display", "none" );
        }
    }

    const homeBtn = $( "#home-btn" );
    homeBtn.on("click", function () {
        toggleOff();
        togglePostsContent();

        // when the posts are toggled, load the pages from ../html/posts.html
        fetch("posts.html")
            .then(response => response.text())
            .then(html => {
                $( ".posts" ).html(html);
            })
            .catch(error => {
                console.error("Error loading posts:", error);
            }
        );
    });



    // Toggle the search form
    function toggleSearchForm() {
        const searchForm = $( "#search-form" );
        if (searchForm.css( "display" ) === "none") {
            searchForm.css( "display", "block" );
        } else {
            searchForm.css( "display", "none" );
        }
    }

    const searchBtn = $( "#search-btn" );
    searchBtn.on("click", function () {
        toggleOff();
        toggleSearchForm();
    });

    // Toggles the register form
    function toggleRegisterForm() {
        const registerForm = $( "#register-form" );
        if (registerForm.css( "display" ) === "none") {
            registerForm.css( "display", "block" );
        } else {
            registerForm.css( "display" , "none");
        }
    }

    const registerBtn = $( "#register-btn" );
    registerBtn.on("click", function () {
        toggleOff();
        toggleRegisterForm();
    });

    // Handle the registration logic
    function handleRegistration(event) {
        // Prevent the default form submission behavior
        event.preventDefault();
        // Get the username and password values
        const username = $( "#reg-username" ).val();
        const password = $( "#reg-password" ).val();
        const confirmPassword = $( "#confirm-password" ).val();
        // Check if they match some predefined values
        if (password === confirmPassword) {
            // If yes, display a success message and reload the page
            alert("Registration successful!");
            window.location.reload();
        } else {
            // If no, display an error message
            toggleErrorRegister();
            alert("Passwords do not match!");
        }
    }

    const regBtn = $( "#register-submit" );
    regBtn.on("click", function (event) {
        // Call the registration function
        handleRegistration(event);
    });

    // Toggle the notification page
    function toggleNotifications() {
        const notificationsContainer = $( "#notification" );
        if (notificationsContainer.css( "display" ) === "none") {
            notificationsContainer.css( "display", "block" );
        } else {
            notificationsContainer.css( "display" , "none");
        }
    }

    const notificationsBtn = $( "#notif-btn" );
    notificationsBtn.on("click", function () {
        toggleOff();
        toggleNotifications();
    });

    // Toggle the profile page
    function toggleProfile() {
        const profileContainer = $( "#profile" );
        if (profileContainer.css( "display" ) === "none") {
            profileContainer.css( "display", "block" );
        } else {
            profileContainer.css( "display" , "none");
        }
    }

    const profileBtn = $( "#profile-btn" );
    profileBtn.on("click", function () {
        toggleOff();
        toggleProfile();
        fetch("posts.html")
            .then(response => response.text())
            .then(html => {
                $( ".profile-posts" ).html(html);
            })
            .catch(error => {
                console.error("Error loading posts:", error);
            }
        );
    });
});


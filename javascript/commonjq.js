$(document).ready( function() {
    const domain = "Cosc360Forums/html/";
    // Toggles everything off
    function toggleOff() {
        const postsContainer = $( ".posts" );
        const searchForm = $( "#search-form" );
        const loginForm = $( "#login-form" );
        const registerForm = $( "#register-form" );
        const notificationsContainer = $( "#notification" );
        const profileContainer = $( "#profile" );
        const sidebar = $( "#sidebar" );
        const modContainer = $( "#moderating" );
        const modUserContainer = $( "#mod-user" );
        const analyticsContainer = $( "#mod-analytics" );
        const reportsContainer = $( "#mod-reports" );
        const postCreation = $( "#create_post" );
        postsContainer.css( "display", "none" );
        searchForm.css( "display", "none" );
        loginForm.css( "display", "none" );
        registerForm.css( "display", "none" );
        notificationsContainer.css( "display", "none" );
        profileContainer.css( "display", "none" );
        sidebar.css( "display", "none" );
        modContainer.css( "display", "none" );
        modUserContainer.css( "display", "none" );
        analyticsContainer.css( "display", "none" );
        reportsContainer.css( "display", "none" );
        postCreation.css( "display", "none" );
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
        //prevent empty fields
        if ((username === "" || username === null)&& (password===null || password === "")) {
            alert("Please enter a username and password.");
            }  
            else{
                if(username ===  "" || username === null){
                    alert("Please enter a username.");
                }
                else {
                    if (password === "" || password === null) {
                    alert("Please enter a password.");
                    }
                }
                
            }
        
       
        
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
        } else {
            postsContainer.css( "display", "none" );
        }
    }

    const postBtn = $( "#post-btn" );
    postBtn.on("click", function () {
        toggleOff();
        togglePostsContent();
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
        const full_name = $( "#full_name" ).val();
        const username = $( "#reg_username" ).val();
        const password = $( "#reg_password" ).val();
        const confirmPassword = $( "#confirm_password" ).val();
        const email = $( "#email" ).val();
        //check for empty fields  
        if(username ===  "" || username === null){
            alert("Please enter a username.");
            return;
        }
        else {
            if (password === "" || password === null) {
            alert("Please enter a password.");
            return;
            }
            else{
                if(confirmPassword === "" || confirmPassword === null){
                    alert("Please enter your password again.");
                    return;
                }
                else{
                    if(email === "" || email === null){
                        alert("Please enter your email.");
                        return;
                    }
                    else{
                        if(full_name === "" || full_name === null){
                            alert("Please enter your full name.");
                            return;
                        }
                    }
                }
            }
        }
        // Check if they match some predefined values
        if(password !== null && password !== "" && confirmPassword !== null && confirmPassword !== ""){
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
    });

    // Toggle the admin sidebar
    function toggleAdmin() {
        const adminContainer = $( "#sidebar" );
        if (adminContainer.css( "display" ) === "none") {
            adminContainer.css( "display", "block" );
        } else {
            adminContainer.css( "display" , "none");
        }
    }

    const adminBtn = $( "#admin-btn" );
    adminBtn.on("click", function () {
        toggleOff();
        toggleAdmin();
    });

    // Toggle the moderater page
    function toggleModerater() {
        const modContainer = $( "#moderating" );
        if (modContainer.css( "display" ) === "none") {
            modContainer.css( "display", "block" );
        } else {
            modContainer.css( "display" , "none");
        }
    }

    const modBtn = $( "#mod-btn" );
    modBtn.on("click", function () {
        toggleOff();
        toggleAdmin();
        toggleModerater();
    });
    
    // Toggle the moderater user page
    function toggleModeraterUser() {
        const modUserContainer = $( "#mod-user" );
        if (modUserContainer.css( "display" ) === "none") {
            modUserContainer.css( "display", "block" );
        } else {
            modUserContainer.css( "display" , "none");
        }
    }
    
    const modUserBtn = $( "#mod-users-btn" );
    modUserBtn.on("click", function () {
        toggleOff();
        toggleAdmin();
        toggleModeraterUser();
    });

    // Toggle the Analytics page
    function toggleAnalytics() {
        const analyticsContainer = $( "#mod-analytics" );
        if (analyticsContainer.css( "display" ) === "none") {
            analyticsContainer.css( "display", "block" );
        } else {
            analyticsContainer.css( "display" , "none");
        }
    }

    const analyticsBtn = $( "#mod-analytics-btn" );
    analyticsBtn.on("click", function () {
        toggleOff();
        toggleAdmin();
        toggleAnalytics();
    });

    // Toggle the Reports page
    function toggleReports() {
        const reportsContainer = $( "#mod-reports" );
        if (reportsContainer.css( "display" ) === "none") {
            reportsContainer.css( "display", "block" );
        } else {
            reportsContainer.css( "display" , "none");
        }
    }

    const reportsBtn = $( "#mod-reports-btn" );
    reportsBtn.on("click", function () {
        toggleOff();
        toggleAdmin();
        toggleReports();
    });


    // Toggles the create post window
    function toggleCreatePost() {
        const postCreation = $( "#create_post" );
        if (postCreation.css( "display" ) === "none") {
            postCreation.css( "display", "block" );
        } else {
            postCreation.css( "display" , "none");
        }
    }

    const create_post_btn = $( "#create_post_btn" );
    create_post_btn.on("click", function () {
        toggleOff();
        toggleCreatePost();
    });

    $("#create_post_form").on('submit', function(e){
        e.preventDefault(); // Prevent the form from submitting via the browser.
        var formData = new FormData(this);
        $.ajax({
            url: 'new_post.php',
            type: 'POST',
            data: formData,
            success: function(data){
                alert('Post submitted successfully');
                window.location.href = 'base.php#'; // Redirect to the posts page
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $.ajax({
        url: 'get_posts.php',
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            var len = response.length;
            for(var i=0; i<len; i++){
                var title = response[i].title;
                var post_id = response[i].post_id;
                var content = response[i].content;
                var image = response[i].image;

                var post = '<article class="post">';
                post += '<h2><a href="view_post.php?post_id=' + post_id + '">Post ' + post_id + ': ' + title + '</a></h2>';
                post += '<p>' + content.replace(/\n/g, "<br>") + '</p>';
                if (image) {
                    post += '<img src="data:image/jpeg;base64,' + image + '" style = "width: 75%; height: auto;"/>';
                }
                post += '</article>';

                $("#posts").append(post);
            }
        }
    });
    // submits the search for users on admin page
    $("#search_users_form").on('submit', function(e){
        e.preventDefault(); // Prevent the form from submitting via the browser.
        var formData = new FormData(this);
        $.ajax({
            url: 'admin_search.php',
            type: 'POST',
            data: formData,
            success: function(data){
                // alert('Search submitted successfully');
                $('#user_disp').html(data);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
    // loads the reported posts for the admin page
    $.ajax({
        url: 'admin_reported_posts.php',
        type: 'GET',
        dataType: 'json',
        success: function(response){
            // alert('Search submitted successfully');
            var len = response.length;
            for(var i=0; i<len; i++){
                var title = response[i].title;
                var post_id = response[i].post_id;
                var content = response[i].content;

                var post = '<article class="post">';
                post += '<h2><a href="view_post.php?post_id=' + post_id + '">Post ' + post_id + ': ' + title + '</a></h2>';
                post += '<p>' + content.replace(/\n/g, "<br>") + '</p>';
                post += '</article>';
                post += '<input type="checkbox" id=' + post_id + 'name=' + post_id + 'value=' + post_id +'></input>';
                $("#reported_posts").append(post);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
    // loads reported users for the admin page
    $.ajax({
        url: 'admin_reported_users.php',
        type: 'GET',
        dataType: 'json',
        success: function(response){
            var len = response.length;
            for(var i=0; i<len; i++){
                var username = response[i].username;
                var user = '<article class="user">';
                user += '<h2>'+ username + '</h2>';
                user += '</article>';
                user += '<input type="checkbox" id=' + username + 'name=' + username + 'value=' + username +'></input>';
                $("#reported_users").append(user);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
    // loads conflicts for the admin page
    $.ajax({
        url: 'admin_conflicts.php',
        type: 'GET',
        dataType: 'json',
        success: function(response){
            var len = response.length;
            for(var i=0; i<len; i++){
                var conflict_id = response[i].conflict_id;
                var username1 = response[i].username1;
                var username2 = response[i].username2;
                var info = response[i].info;
                var conflict = '<article class="conflict">';
                conflict += '<h2>'+ username1 + '</h2>';
                conflict += '<h2>'+ username2 + '</h2>';
                conflict += '<p>'+ info + '</p>';
                conflict += '<input type="checkbox" id=' + conflict_id + 'name=' + conflict_id + 'value=' + conflict_id + '></input>';
                conflict += '</article>';
                
                $("#conflicts").append(conflict);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
});


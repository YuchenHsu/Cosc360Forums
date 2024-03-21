$(document).ready( function() {
    const domain = "Cosc360Forums/html/";
    // Toggles everything off
    function toggleOff() {
        const postsContainer = $( ".posts" );
        const searchForm = $( "#search-form" );
        const loginForm = $( "#login-form" );
        const registerForm = $( "#register-div" );
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

    // Toggles the posts content
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
        const registerForm = $( "#register-div" );
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
            success: function(){
                alert('Post submitted successfully');
                window.location.href = 'base.php#'; // Redirect to the posts page
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $("#search_form").on('submit', function(e){
        e.preventDefault(); // Prevent the form from submitting via the browser.
        var formData = $(this).serialize();
        $.ajax({
            url: 'posts.php',
            type: 'GET',
            data: formData,
            success: function(data){
                // alert('Search submitted successfully');
                $('#search_results').html(data);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    function getPosts() {
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
    }

    getPosts();


    $('#register-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'reg_function.php', // URL of your PHP script
            type: 'POST',
            data: $(this).serialize(),
            success: function(data) {
                alert('Registration successful');
                // reload the page and go to base.php
                window.location.href = 'base.php#';
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle the error response from the server
                alert(jqXHR.responseText);
            }
        });
    });

    // Handle the login form submission
    $('#login-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'login_function.php', // URL of your PHP script
            type: 'POST',
            data: $(this).serialize(),
            success: function(data) {
                alert('Login successful');
                // reload the page and go to base.php
                window.location.href = 'base.php#';
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle the error response from the server
                alert(jqXHR.responseText);
            }
        });
    });
});


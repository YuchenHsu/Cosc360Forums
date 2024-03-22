$(document).ready(function() {
    // Load the post page by default
    $("#content").load("posts.php");

    // Use event delegation to handle click events on the post links
    $("#content").on("click", ".post_id", function(e) {
        e.preventDefault();
        var post_id = $(this).attr("href").split("=")[1];
        $("#content").load("post_detail.php?post_id=" + post_id);
    });

    $(".topnav a").on("click", function(e) {
        var page = $(this).data("page");
        $("#content").load(page);
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
});

$(document).on("click", "#register-btn", function(e) {
    e.preventDefault();
    $("#content").load("register.php");
});

$(document).on("click", "#login-btn", function(e) {
    e.preventDefault();
    $("#content").load("login.php");
});

$(document).on("click","#sidebar li a", function(e) {
    e.preventDefault();
    var page = $(this).data("page");
    $("#admin_content").load(page, function(response, status, xhr) {
        if (status == "error") {
            console.log("Error: " + xhr.status + " " + xhr.statusText);
        }
    });
    $.ajax({
        url: 'admin_reported_posts.php',
        type: 'GET',
        dataType: 'json',
        success: function(response){
            // alert('Search submitted successfully');
            var len = response.length;
            console.log(len);
            for(var i=0; i<len; i++){
                var title = response[i].title;
                var post_id = response[i].post_id;
                var content = response[i].content;

                var post = '<article class="post" style="width: 70%; padding:0.5em;">';
                post += '<input type="checkbox" id=' + post_id + 'name= selected[] value=' + post_id +'></input>';
                post += '<a href="post_detail.php?post_id=' + post_id + '" style="font-size: 1.2em;">Post ' + post_id + ': ' + title + '</a>';
                post += '<p>' + content.replace(/\n/g, "<br>") + '</p>';
                post += '</article>';
                $("#reported_posts").append(post);
            }
        },
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
                user += '<input type="checkbox" id=' + username + 'name= selected[] value=' + username +'></input>';
                user += '<h2>'+ username + '</h2>';
                user += '</article>';
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
                conflict += '<input type="checkbox" id=' + conflict_id + 'name= selected[] value=' + conflict_id + '></input>';
                conflict += '<h2>'+ username1 + '</h2>';
                conflict += '<h2>'+ username2 + '</h2>';
                conflict += '<p>'+ info + '</p>';
                conflict += '</article>';
                $("#conflicts").append(conflict);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

$(document).on("click", "#logout_form", function(e) {
    e.preventDefault();
    $.ajax({
        url: 'logout_function.php',
        type: 'POST',
        success: function() {
            alert('Logout successful');
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

// toggles the edit profile form
$(document).on("click", "#edit_profile", function(e) {
    e.preventDefault();
    $("#image_input").html("<input type='file' name='profile_img'>");
    $("#full_name_input").html("<input type='text' name='full_name' value='" + $("#full_name_input").text() + "'>");
    $("#email_input").html("<input type='text' name='email' value='" + $("#email_input").text() + "'>");
    $("#button_stuff").html("<button type='submit' id='submit_profile'>Save</button>");
});

// submits view profile form
$(document).on("submit", "#view_profile_form", function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        url: 'view_profile_function.php',
        type: 'GET',
        data: formData,
        success: function() {
            // alert('Profile updated successfully');
            // location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle the error response from the server
            alert(jqXHR.responseText);
        },
        contentType: false,
        processData: false
    });
});

// submits the edit profile form
$(document).on("submit", "#edit_profile_form", function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        url: 'edit_profile_function.php',
        type: 'POST',
        data: formData,
        success: function() {
            alert('Profile updated successfully');
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle the error response from the server
            alert(jqXHR.responseText);
        },
        contentType: false,
        processData: false
    });

});

$(document).on("click", "#create_redirect", function(e) {
    e.preventDefault();
    $("#content").load("login.php");
});

$(document).on("submit", "#comment_form", function(e) {
    e.preventDefault();
    $.ajax({
        url: 'comment_function.php',
        type: 'POST',
        data: $(this).serialize(),
        success: function(data) {
            // alert('Comment submitted successfully');
            // reload the page
            location.reload();
            // let post_id = $("#post_id").attr("value");
            // $("#content").load("post_detail.php?post_id=" + post_id);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle the error response from the server
            alert(jqXHR.responseText);
        }
    });
});

$(document).on("submit", "#create_post_form", function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: 'create_post_function.php',
        type: 'POST',
        data: formData,
        success: function() {
            alert('Post submitted successfully');
            // redirect to base.php and reload the page
            window.location.href = 'base.php#';
            location.reload();
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

$(document).on("submit", "#register-form", function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        url: 'reg_function.php', // URL of your PHP script
        type: 'POST',
        data: formData,
        success: function(data) {
            // alert('Registration successful');
            // reload the page and go to base.php
            // window.location.href = 'base.php#';
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle the error response from the server
            alert(jqXHR.responseText);
        },
        contentType: false,
        processData: false
    });
});

$(document).on("submit", "#login-form", function(e) {
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

$(document).on("submit", "#post_interaction" , function(e) {
    e.preventDefault();
    $.ajax({
        url: 'post_interact.php', // URL of your PHP script
        type: 'POST',
        data: $(this).serialize(),
        success: function(data) {
            let post_id = $("#post_id_interact").attr("value");
            $("#content").load("post_detail.php?post_id=" + post_id);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle the error response from the server
            alert(jqXHR.responseText);
        }
    });
});

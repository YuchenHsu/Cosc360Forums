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
    $("#full_name_input").html("<input type='text' name='full_name' value='" + $("#full_name_input").text() + "'>");
    $("#email_input").html("<input type='text' name='email' value='" + $("#email_input").text() + "'>");
    $("#button_stuff").html("<button type='submit' id='submit_profile'>Save</button>");
});

// submits the edit profile form
$(document).on("submit", "#edit_profile_form", function(e) {
    e.preventDefault();
    $.ajax({
        url: 'edit_profile_function.php',
        type: 'POST',
        data: $(this).serialize(),
        success: function() {
            alert('Profile updated successfully');
            location.reload();
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

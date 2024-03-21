$(document).ready(function() {
    // Check if the user is already logged in
    // var userLoggedIn = getCookie("userLoggedIn");
    // if (userLoggedIn == "true") {
    //     // Show the logout button
    //     $("#logout").show();
    //     // Hide the login and register buttons
    //     $("#login").hide();
    //     $("#register").hide();
    // } else {
    //     // Hide the logout button
    //     $("#logout").hide();
    //     // Show the login and register buttons
    //     $("#login").show();
    //     $("#register").show();
    // }

    $(function(){
        $(".topnav a").on("click", function(e) {
            var page = $(this).data("page");
            $("#content").load(page);
        });
    });

    $("#content").load(page, function(response, status, xhr) {
        if (status == "error") {
            console.log("Error: " + xhr.status + " " + xhr.statusText);
        }
    });
});

$(document).on("submit", "#create_post_form", function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: 'new_post.php',
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

$(document).on("submit", "#loginForm", function(e) {
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

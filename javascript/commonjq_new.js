$(document).ready(function() {
    // Load the post page by default
    $("#content").load("posts.php");

    $(".topnav a").on("click", function(e) {
        var page = $(this).data("page");
        $("#content").load(page);
    });
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

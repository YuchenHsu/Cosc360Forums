$(document).ready( function() {
});


$(document).on('submit', '#reported_posts_form', function(e){
    e.preventDefault(); // Prevent the form from submitting via the browser.
    var selected = [];
    $('input[type=checkbox]:checked').each(function() {
        selected.push($(this).val());
    });
    // Manually serialize form data
    var formData = {
        selected: selected
    };
    console.log(selected);
    $.ajax({
        url: 'admin_delete_posts.php',
        type: 'POST',
        data: formData,
        success: function(data){
            //alert('Search submitted successfully');
            $('#reported_posts').html(data);
        },
    });
});
$(document).on('submit', '#reported_users_form', function(e){
    e.preventDefault(); // Prevent the form from submitting via the browser.
    var selected = [];
    $('input[type=checkbox]:checked').each(function() {
        selected.push($(this).val());
    });
    // Manually serialize form data
    var formData = {
        selected: selected
    };
    console.log(selected);
    $.ajax({
        url: 'admin_ban_users.php',
        type: 'POST',
        data: formData,
        success: function(data){
            //alert('Search submitted successfully');
            if (data == '[]') {
                $('#reported_users').html('<p>No users to ban</p>');
            } else {
                $('#reported_users').html(data);
            }
        },
    });
});
$(document).on('submit', '#conflicts_form', function(e){
    e.preventDefault(); // Prevent the form from submitting via the browser.
    var selected = [];
    $('input[type=checkbox]:checked').each(function() {
        selected.push($(this).val());
    });
    // Manually serialize form data
    var formData = {
        selected: selected
    };
    console.log(selected);
    $.ajax({
        url: 'admin_resolve_conflicts.php',
        type: 'POST',
        data: formData,
        success: function(data){
            //alert('Search submitted successfully');
            if (data == '[]') {
                $('#conflicts').html('<p>No conflicts to resolve</p>');
            } else {
                $('#conflicts').html(data);
            }
        },
    });
});
$(document).on('submit', '#search_users_form', function(e){
    e.preventDefault(); // Prevent the form from submitting via the browser.
    const search = $("#search_users").val();
    if (search === "" || search === null) {
        alert("Please enter a username to search for.");
    }
    var formData = new FormData(this);
    $.ajax({
        url: 'admin_search.php',
        type: 'POST',
        data: formData,
        success: function(data){
            // alert('Search submitted successfully');
            if (data == '[]') {
                $('#user_disp').html('<p>No users found</p>');
            } else {
                $('#user_disp').html(data);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
});
$(document).on('submit', '#search_posts_form', function(e){
    e.preventDefault(); // Prevent the form from submitting via the browser.
    const search = $("#search_posts").val();
    if (search === "" || search === null) {
        alert("Please enter a post to search for.");
    }
    var formData = new FormData(this);
    $.ajax({
        url: 'admin_search_post.php',
        type: 'POST',
        data: formData,
        success: function(data){
            // alert('Search submitted successfully');
            if (data == '[]') {
                $('#post_disp').html('<p>No Posts found</p>');
            } else {
                $('#post_disp').html(data);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

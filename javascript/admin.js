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
            $('#reported_users').html(data);
        },
    });
});
$(document).on('submit', '#conlicts_form', function(e){
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
            $('#conflicts').html(data);
        },
    });
});
$(document).on('submit', '#search_users_form', function(e){
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

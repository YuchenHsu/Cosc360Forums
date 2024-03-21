$(document).ready( function() {
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
                post += '<input type="checkbox" id=' + post_id + 'name= selected[] value=' + post_id +'></input>';
                post += '<h2><a href="view_post.php?post_id=' + post_id + '">Post ' + post_id + ': ' + title + '</a></h2>';
                post += '<p>' + content.replace(/\n/g, "<br>") + '</p>';
                post += '</article>';
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
    });
    // deletes the selected posts
    $("#reported_posts_form").on('submit', function(e){
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
    // bans the selected users
    $("#reported_users_form").on('submit', function(e){
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
    // bans the selected users and marks conflicts as resolved
    $("#conflicts_form").on('submit', function(e){
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
});
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>View Post</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/base.css" >
        <script src="../javascript/jquery-3.7.1.js"></script>
    </head>
    <body>
        <nav id="navbar"></nav>
        <div class="post">
            <div id="post_content"></div>
            <div class="post_interaction">
                <span class="votes">
                    <button type="submit" id="upvote">↑</button><span>3</span>
                    <button type="submit" id="downvote">↓</button><span>3</span>
                </span>
                <!-- <span class="report_post"> -->
                    <button class="report_post" type="submit">Report</button> 
                <!-- </span> -->
                <section class="comment_container">
                    <h2>Comments</h2>
                    <div id="comment_content"></div>
                </section>
            </div>
        </div>
        <script>
        $(function(){
            $("#navbar").load("navbar.php");
            // $.getScript("../javascript/common.js");
            $.getScript("../javascript/commonjq.js");
            // pick a random post from the comments file
            const searchParams = new URLSearchParams(window.location.search);
            let post_avail = searchParams.has("post_id");
            let post_num = post_avail ? searchParams.get("post_id") : (Math.floor(Math.random() * 9) + 1);

            let post_id =   "posts.php #post" + post_num; 
                console.log(post_id);

            $("#post_content").load( post_id );
            $("#comment_content").load( "comments.php", function() {
                $(".comment").append("<button type=\"submit\" class=\"report_comment\">Report</button>");
            });
        });
        </script>
    </body>
</html>
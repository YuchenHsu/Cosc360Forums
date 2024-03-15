<!-- base.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forum</title>
        <link rel="stylesheet" href="../css/base.css">
    </head>
    <body>
        <!-- <div id="navbar"></div> -->
        <!-- include the topnav.php -->
        <?php include "topnav.php"; ?>

        <!-- include the login.php -->
        <?php include "login.php"; ?>

        <!-- include the register.php -->
        <?php include "register.php"; ?>

        <!-- include the search.php -->
        <?php include "search.php"; ?>

        <!-- include the notification.php -->
        <?php include "notification.php"; ?>

        <!-- include the profile.php -->
        <?php include "profile.php"; ?>

        <!-- include the admin.php -->
        <?php include "admin.php"; ?>

        <!-- include the create_post.php -->
        <?php include "create_post.php"; ?>


        <div class="posts">
            <!-- include the posts.php -->
            <?php include "posts.php"; ?>
        </div>
        <!-- <script src="../javascript/common.js"></script> -->
        <script src="../javascript/jquery-3.7.1.js"></script>
        <script>
        $(function(){
            // $("#navbar").load("navbar.php");
            // $.getScript("../javascript/common.js");
            $.getScript("../javascript/commonjq.js");
            $.getScript("../javascript/admin_security.js");
            $.getScript("../javascript/new_post_security.js");
            $.getScript("../javascript/search_security.js");
        });
        </script>
    </body>
</html>

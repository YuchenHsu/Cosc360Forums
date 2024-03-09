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
        <div id="navbar"></div>

        <div id="notification" class="form-container" style="display: none;">
            <h3>Notification</h3>
            <p>Notification 1</p>
            <p>Notification 2</p>
            <p>Notification 3</p>
        </div>

        <div class="posts" style="display: none;">
            <!-- Posts content will be loaded dynamically -->
        </div>
        <!-- <script src="../javascript/common.js"></script> -->
        <script src="../javascript/jquery-3.7.1.js"></script>
        <script>
        $(function(){
            $("#navbar").load("navbar.php");
            // $.getScript("../javascript/common.js");
            $.getScript("../javascript/commonjq.js");
            $.getScript("../javascript/admin_security.js");
            $.getScript("../javascript/new_post_security.js");
            $.getScript("../javascript/search_security.js");
        });
        </script>
    </body>
</html>

<!-- index.php  -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forum</title>
        <link rel="stylesheet" href="../css/base.css">
        <link rel="stylesheet" href="../css/topbar.css">
        <link rel="stylesheet" href="../css/dropdown.css">
        <link rel="stylesheet" href="../css/post.css">
        <link rel="stylesheet" href="../css/create_post.css">
        <link rel="stylesheet" href="../css/register_login.css">
        <link rel="stylesheet" href="../css/profile.css">
        <link rel="stylesheet" href="../css/post_interaction.css">
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="../css/breadcrumbs.css">
        <link rel="icon" href="../favicon.ico" type="image/ico">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
        <?php include "topnav.php"; ?>
        <div id="content"></div>
        <!-- <script src="../javascript/common.js"></script> -->
        <script src="../javascript/jquery-3.7.1.js"></script>
        <script>
        $(function(){
            // $("#navbar").load("navbar.php");
            // $.getScript("../javascript/common.js");
            $.getScript("../javascript/commonjq_new.js");
            $.getScript("../javascript/new_post_security.js");
            $.getScript("../javascript/search_security.js");
            $.getScript("../javascript/admin.js");
        });
        </script>
    </body>
</html>

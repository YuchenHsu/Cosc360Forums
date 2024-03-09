<!DOCTYPE html>
    <html>
        <head>
            <title>Admin</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="../css/base.css">
            <script src="../javascript/jquery-3.7.1.js"></script>
        </head>
        <body>
            <div id="navbar"></div>
            <div id="admin">
                <h1>Admin</h1>
                <!-- Side bar buttons for admin-->
            <div id="sidebar">
                    <li><a href="#moderating">Moderating</a></li>
                    <li><a href="#users">Users</a></li>
                    <li><a href="#analytics">Analytics</a></li>
                    <li><a href="#reports">Reports</a></li>
            </div>
            <!-- Content for moderating admin page -->
            <div id="moderating" >
                <h2>Moderating</h2>
                <p>Here you can moderate the forums. You can delete posts, ban users, and more.</p>
                <table>
                    <tr>
                        <th>Reported Posts</th>
                        <th>Reported Users</th>
                        <th>Conflicts</th>
                    </tr>
                    <tr>
                        <td>Post 1<button>Remove</button></td>
                        <td>User 1<button>Disable</button></td>
                        <td>Conflict 1</td>
                </table>
            </div>
            <!-- Content for Users Moderating admin page-->
            <div id="mod-user" style="display: none">
                <h2>Users</h2>
                <p>Here you can view all the users and their information. You can also ban users.</p>
                <form method="POST">
                    <input type="text" name="search" placeholder="Search users" id="search-users">
                    <button type="submit">Search</button>
                </form>
                <div class="user_disp">
                    <p>User 1</p>
                    <button>View</button>
                    <button>Disable</button>
                </div>
            </div>
            <!-- Content for Analytics admin page-->
            <div id="mod-analytics" style="display: none">
                <h2>Analytics</h2>
                <p>Here you can view the analytics of the forums. You can see how many users are active, how many posts are made, and more.</p>
                <div class="container">
                    <h4>Up Votes to Down Votes:</h4>
                    <p>53:20</p>
                    <h4>Daily Users Logged In:</h4>
                    <p>30%</p>
                    <h4>Top Post</h4>
                </div>
            </div>
            <!-- Content for Reports admin page-->
            <div id="reports" style="display: none">
                <h2>Reports</h2>
                <p>Here you can view the reports for the forum.</p>
                <figure>
                    <img src="../images/posts.png" alt="New Users Over Time">
                    <figcaption>New Users Over Time</figcaption>
                </figure>
                <figure>
                    <img src="../images/posts.png" alt="Posts Over Time">
                    <figcaption>Posts Over Time</figcaption>
                </figure>
            </div>

            <!-- <script src="../javascript/common.js"></script> -->
        <script>
        $(function(){
            $("#navbar").load("navbar.php");
            // $.getScript("../javascript/common.js");
            $.getScript("../javascript/commonjq.js");
        });
        </script>
        </body>

    </html>

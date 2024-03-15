<!-- make an invisible profile page that's toggled by the js -->
<div id="profile" class="form-container" style="display: none;">
    <div class="profile-container">
        <div class="profile">
            <!-- Profile section -->
            <img class="profile-pic" src="../images/social/twitter_16.png" alt="Profile Picture">
            <h2>User Profile</h2>
            <p><strong>Username:</strong> <!-- Add username here --></p>
            <p><strong>Email:</strong> <!-- Add email here --></p>
        </div>
        <?php include "profile_posts.php"; ?>
    </div>
</div>
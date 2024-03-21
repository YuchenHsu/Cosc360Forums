<div id="register-div">
    <form id="register-form" class="form-container" method="POST" enctype="multipart/form-data">
        <button id="login-btn" class="switch_btn" type="button" data-page="login.php">Login</button>
        <button id="register-btn" class="switch_btn log_active" type="button" data-page="register.php">Register</button>
        <div class="full_name">
            <label for="full_name">Full Name: </label>
            <input id="full_name" type="text" name="full_name" required title="Firstname must contain only letters and numbers">
        </div>
        <div class="email">
            <label for="email">Email: </label>
            <input id="email" type="email" name="email" required title="Enter a valid email address">
        </div>
        <div class="username">
            <label for="reg_username">Username: </label>
            <input id="reg_username" type="text" name="reg_username" required title="Username must contain only letters and numbers">
        </div>
        <div class="password">
            <label for="reg_password">Password: </label>
            <input id="reg_password" type="password" name="reg_password" required title="Password must be at least 8 characters, contain at least one uppercase letter, one lowercase letter, and one number">
        </div>
        <div class="confirm">
            <label for="confirm_password">Confirm Password:</label>
            <input id="confirm_password" type="password" name="conf_password" required title="Passwords must match">
        </div>
        <div class="profile_pic">
            <label for="profile_pic">Profile Picture: </label>
            <input type="file" name="profile_pic" id="profile_pic" accept="image/png, image/jpeg">
        </div>
        <br>
        <button id="register-submit" type="submit">Submit</button>
    </form>
</div>

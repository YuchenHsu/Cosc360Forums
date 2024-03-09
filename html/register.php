<!-- Make a invisible register form that's toggled by the js -->
<form id="register-form" class="form-container" style="display: none;">
    <button id="login-btn-1" type="button">Login</button>
    <button id="register-btn" type="button">Register</button>
    <div class="full_name">
        <label for="full_name">Full Name: </label>
        <input id="full_name" type="text" name="full_name" required>
    </div>
    <div class="email">
        <label for="email">Email: </label>
        <input id="email" type="email" name="email" required>
    </div>
    <div class="username">
        <label for="username">Username: </label>
        <input id="username" type="text" name="username" required>
    </div>
    <div class="password">
        <label for="password">Password: </label>
        <input id="password" type="password" name="password" required>
    </div>
    <div class="confirm">
        <label for="password_confirm">Confirm Password:</label>
        <input id="password_confirm" type="password" name="password" required>
    </div>
    <div class="profile_pic">
        <label for="profile_pic">Profile Picture: </label>
        <input type="file" name="profile_pic" id="profile_pic" accept="image/png, image/jpeg">
    </div>
    <br>
    <button id="register-submit" type="submit">Submit</button>
</form>

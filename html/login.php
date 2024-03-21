<!-- Make a invisible login form that's toggled by the js -->
<form id="login-form" class="form-container" style="display: none;">
    <button id="login-btn" type="button">Login</button>
    <button id="register-btn" type="button">Register</button>
    <div class="username">
        <label for="username">Username: </label>
        <input id="username" type="text" name="username" required>
    </div>
    <div class="password">
        <label for="password">Password: </label>
        <input id="password" type="password" name="password" required>
    </div>
    <div class="remember">
        <input id="remember" type="checkbox" name="remember">
        <label for="remember">Remember me</label>
    </div>
    <button id="login-submit" type="submit">Submit</button>
</form>

<div id="create_post" style=>
    <?php
        session_start();
        if (!isset($_SESSION["username"])) {
            echo "<h2 id='create_redirect' style='
            display: block;
            width: 25%;
            padding: 2em;
            margin: 15% auto;
            font-size: 1.5em;
            background-color: #ff6f59ff;
            text-align: center;
        '>You must be logged in to create a post. Click <a href=\"login.php\" id='create_redirect'>here</a> to login.</h2>";
        } else {
    ?>
    <form class="create_post form-container" id="create_post_form" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Create your post:</legend>
            <label for="category_id">Category:</label>
            <!-- create a select dropdown box using pdo to get the data from localhost, database called forum, and the table is called category -->
            <select name="category_id" id="category_id">
                <?php
                    include "connect.php";

                    $sql = "SELECT * FROM category";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();

                    $categories = $stmt->fetchAll();

                    foreach ($categories as $category) {
                        echo "<option value=\"{$category['id']}\">{$category['name']}</option>";
                    }
                ?>
            </select>
            <br>
            <label for="title">Post title:</label>
            <input required type="text" name="title" id="title">
            <br>
            <label for="post_body">Post body:</label>
            <textarea required rows="10" cols="60" placeholder="Insert your post text here:" id="post_body" name="post_body"></textarea>
            <!-- below input accepts png and jpeg files -->
            <br>
            <label for="post_image">Insert image here: </label>
            <input type="file" name="post_image" id="post_image" accept="image/png, image/jpeg">
            <br>
            <input type="submit" value="submit" id="new_post_submit">
        </fieldset>
    </form>
    <?php
        }
    ?>
</div>

<div id="create_post" style="display: none">
    <!-- <form class="create_post form-container" id="create_post_form" action="new_post.php" method="POST" enctype="multipart/form-data"> -->
    <form class="create_post form-container" id="create_post_form" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Create your post:</legend>
            <label for="title">Post title: <input required type="text" name="title" id="title"></label>
            <br>
            <label for="post_body">Post body:</label>
            <textarea required rows="10" cols="60" placeholder="Insert your post text here:" id="post_body" name="post_body"></textarea>
            <!-- below input accepts png and jpeg files -->
            <br>
            <label for="post_image">Insert image here: <input type="file" name="post_image" id="post_image" accept="image/png, image/jpeg"></label>
            <input type="submit" value="submit" id="new_post_submit">
        </fieldset>
    </form>
</div>
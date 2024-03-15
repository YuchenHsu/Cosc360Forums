<!-- posts.php -->
<h1>Welcome to COSC360Forums!</h1>
<p>Here are some interesting posts:</p>
<!-- <article class="post" id="post1">
    <h2><a href=view_post.php?post_id=1>Post 1: Lorem Ipsum</a></h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</article>
<article class="post" id="post2">
    <h2><a href=view_post.php?post_id=2>Post 2: Another Topic</a></h2>
    <p>Nullam nec justo ac odio bibendum aliquet.</p>
</article> -->
<?php
try {
    $connString = "mysql:host=localhost; dbname=forums";
    $user = "root";
    $pass = "";

    $pdo = new PDO($connString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM post LIMIT 50";
    $result = $pdo->query($sql);
    foreach ($result as $key => $value) {
        $post_id = $value["post_id"];
        $title = $value["title"];
        $content = $value["content"];
        ?>
<article class="post" id="post<?=$post_id?>">
<h2><a href="view_post.php?post_id=<?=$post_id?>">Post <?=$post_id?>: <?=$title?></a></h2>
<p><?=$content?></p>
</article> 
        <?php

    }





    $pdo = null;
} catch (PDOException $e) {
    die( $e->getMessage() );
}
?>

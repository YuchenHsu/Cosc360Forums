<?php
    $connString = "mysql:host=localhost; dbname=forums";
    $user = "root";
    $pass = "";

    $pdo = new PDO($connString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?><?php

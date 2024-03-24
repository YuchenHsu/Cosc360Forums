<?php
    // $connString = "mysql:host=localhost; dbname=forums";
    // $user = "root";
    // $pass = "";

    $connString = "mysql:host=localhost; dbname=db_75492660";
    $user = "75492660";
    $pass = "correcthorsebatterystaple";

    $pdo = new PDO($connString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?><?php

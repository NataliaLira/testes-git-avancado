<?php

    $dsn = 'mysql:host=localhost;dbname=fs3_hello;charset=utf8mb4;port=8000';
    $db_user = 'root';
    $db_pass = '03v01t96m';

    try {
        $db = new PDO($dsn, $db_user, $db_pass);
    }
    catch(PDOException $Exception) {
        echo $Exception->getMessage(); 
    }   

?>
<?php

    $dsn = 'mysql:host=localhost;dbname=aula_pdo;charset=utf8mb4;port=3306';
    $db_user = 'root';
    $db_pass = '03v01t96m';

    try {
        $db = new PDO($dsn, $db_user, $db_pass);
    }
    catch(PDOException $Exception) {
        echo $Exception->getMessage(); 
    }   

?>
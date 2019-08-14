<?php

<<<<<<< HEAD
    $dsn = 'mysql:host=www.facebook.com/perfil;dbname=fs3_hello;port=8000';
    $db_user = 'root';
    popopo
    $db_pass = '03v01t96m';
=======
    $dsn = 'mysql:host=localhost;dbname=aula_pdo;charset=utf8mb4;port=dsadsa';
    $db_user = 'root';
    $db_pass = '';
>>>>>>> 49ff447408909c156a00432d02ad78936bd3f75b

    try {
        $db = new PDO($dsn, $db_user, $db_pass);
    }
    catch(PDOException $Exception) {
        echo $Exception->getMessage(); 
    }   

?>
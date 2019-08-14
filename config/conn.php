<?php

    $dsn = 'mysql:host=www.facebook.com/perfil;dbname=fs3_hello;port=8000';
    $db_user = 'root';
    popopo
    $db_pass = '03v01t96m';

    try {
        $db = new PDO($dsn, $db_user, $db_pass);
    }
    catch(PDOException $Exception) {
        echo $Exception->getMessage(); 
    }   

?>
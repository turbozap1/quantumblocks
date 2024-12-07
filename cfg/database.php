<?php
    define('HOST', 'host');
    define('DB_NAME', 'name');
    define('USER', 'name');
    define('PASSWORD', 'password');
    
    try {
        $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASSWORD);
    } catch(PDOException $e) {
        echo $e;
    }
?>

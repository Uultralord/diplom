<?php 
// Подключение к серверу, базе данных и таблице //  
    define('USER', 'amin');   
    define('PASSWORD', 'bbommsdaxbin');     
    define('HOST', 'localhost');
    define('DATABASE', 'user');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: Ошибка подключения к БД " . $e->getMessage());
    }
?>
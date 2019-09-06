<?php
$databaseHost = 'localhost';
$databaseName = 'countries';
$databaseUsername = 'root';
$databasePassword = '';

try {
    // тут подключаем БД исполльзую PDO
    $dbConn = new PDO("mysql:host={$databaseHost};dbname={$databaseName}", $databaseUsername, $databasePassword);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting Error Mode as Exception
} catch(PDOException $e) {
    echo $e->getMessage();
}

?>
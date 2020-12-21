<?php

$conn;

function connect(&$conn)
{

    try {
        $conn = new PDO("mysql:host=localhost:3306;dbname=cerk_practica", "cerk_webmaster", "C3rkc0m4Ra63b");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function disconnect(&$conn){
    $conn = null;
}

?>
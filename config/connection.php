<?php

$host = "localhost";
$dbname = "agenda";
$user = "root";
$pass = "";

try{

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    // Ativar modo erro
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    // erro na conexão
    $error = $e->getMessage();
    echo "Error: $error"; 
}
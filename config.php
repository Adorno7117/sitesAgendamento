<?php
session_start();

$servername = "localhost";
$port = "3306";
$username = "root";
$password = "";
$dbname = "banco1"; 

$conn = new mysqli($servername . ":" . $port, $username, $password, $dbname);
echo('Conectado');
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    echo('Desconectado');
}

?>
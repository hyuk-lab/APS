<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo"Conectado com sucesso!";
}

?>
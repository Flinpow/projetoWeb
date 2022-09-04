<?php
require "credentials.php";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
if (mysqli_query($conn, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$sql = "CREATE TABLE IF NOT EXISTS usuario (id int AUTO_INCREMENT primary key,nome varchar(30),email varchar(50),senha varchar(50),tipo int);";
mysqli_select_db($conn, $dbName);
if (mysqli_query($conn, $sql)) {
    echo "<br>Table usuario created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
// cria tabela das solicitações
$sql = "CREATE TABLE IF NOT EXISTS solicitacoes (id int AUTO_INCREMENT primary key,tipo varchar(20), descricao varchar(100), status_solicitacao varchar(15) );";
mysqli_select_db($conn, $dbName);

if (mysqli_query($conn, $sql)) {
    echo "<br>Table solicitacoes created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Cria chave estrangeria nas solicitações para referenciar o usuario que as criou
$sql = "ALTER TABLE solicitacoes ADD CONSTRAINT fk_idUsuario FOREIGN KEY (id) REFERENCES usuario (id)";

//if (mysqli_query($conn, $sql)) {
 // echo "<br>FK created successfully";
//} else {
 // echo "Error creating FK: " . mysqli_error($conn);
//}
mysqli_close($conn);
?>

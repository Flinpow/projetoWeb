<?php
require "conn.php";


// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
if (mysqli_query($conn, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$sql = "CREATE TABLE IF NOT EXISTS usuarios (id int AUTO_INCREMENT primary key,nome varchar(30),email varchar(50),senha varchar(200),tipo int);";
if (mysqli_query($conn, $sql)) {
    echo "<br>Table usuario created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
// cria tabela das solicitações
$sql = "CREATE TABLE IF NOT EXISTS solicitacoes (id int AUTO_INCREMENT primary key,tipo varchar(20), descricao varchar(100), status_solicitacao varchar(15) );";

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

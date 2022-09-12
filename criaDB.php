<?php
require "credentials.php";
$admPassword = md5('nimda');
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
  $conn = mysqli_connect($servername, $username, $password, $dbName);
} else {
  echo "Error creating database: " . $conn->error;
}
$sql = "CREATE TABLE IF NOT EXISTS usuarios (id int AUTO_INCREMENT primary key,nome varchar(30), usuario varchar(30) unique,email varchar(50),senha varchar(200),tipo int);";
if (mysqli_query($conn, $sql)) {
    echo "<br>Table usuarios created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
// cria tabela das solicitações
$sql = "CREATE TABLE IF NOT EXISTS solicitacoes (id int AUTO_INCREMENT primary key,tipo varchar(20), usuario varchar(30), descricao varchar(100), status_solicitacao varchar(15), foreign key (usuario) references usuarios(usuario) );";

if (mysqli_query($conn, $sql)) {
    echo "<br>Table solicitacoes created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

//Criando usuário administrador
$sql = "INSERT INTO usuarios(nome, usuario, email, senha, tipo) VALUES ('admin', 'admin', 'admin@gmail.com', '$admPassword', 1 );";
if (mysqli_query($conn, $sql)) {
  echo "<br>User administrador created successfully ";
} else {
  echo "Error adm user: " . mysqli_error($conn);
}

// Cria chave estrangeria nas solicitações para referenciar o usuario que as criou
$sql = "ALTER TABLE solicitacoes ADD CONSTRAINT fk_idUsuario FOREIGN KEY (id) REFERENCES usuario (id)";

mysqli_close($conn);
?>

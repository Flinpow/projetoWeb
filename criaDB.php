<?php
$servername = "localhost";
$username = "ds122";
$password = "123";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS projeto_web1";
if (mysqli_query($conn, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$sql = "CREATE TABLE IF NOT EXISTS usuarios (id int AUTO_INCREMENT primary key,nome varchar(30),email varchar(50),senha varchar(50),tipo int);";
mysqli_select_db($conn,'projeto_web1');
if (mysqli_query($conn, $sql)) {
    echo "<br>Table usuarios created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

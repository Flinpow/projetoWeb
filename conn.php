<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbName = "projeto_web1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbName);
// Check connection
if (!$conn) {
  die("Connection failed: " . $conn->connect_error);
}


?>

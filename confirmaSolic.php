
<?php
include_once("verificaSession.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
require "conn.php";
function verifica_campo($texto){
  $texto = trim($texto);
  $texto = stripslashes($texto);
  $texto = htmlspecialchars($texto);
  return $texto;
}

$type = $_POST["type"];
$description = $_POST["description"];

//verificação das strings
//TODO
  
$type = verifica_campo($type);
$description = verifica_campo($description);

// Check connection
if (!$conn) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO solicitacoes(tipo, usuario, descricao, status_solicitacao) VALUES ('$type', '".$_SESSION["logado"]."', '$description', 'Em processo')";
if (mysqli_query($conn, $sql)) {
	header("Location: mainPage.php");

} else {
    echo "Erro ao criar solicitação: " . mysqli_error($conn);
}
  }
mysqli_close($conn);
?>


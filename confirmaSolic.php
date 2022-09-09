
<?php
//pagina que cria a solicitação. Pensei em fazer a pagina com uma 
//mensagem de confirmação e dar as opções do usuário realizar uma nova solicitação 
//OU vizualizar as suas (indo pra nossa pagina principal que ainda nao esta criada).
require "conn.php";

$type = $_POST["type"];
$description = $_POST["description"];


$sql = "INSERT INTO solicitacoes(tipo, descricao, status_solicitacao) VALUES ('$type', '$description', 'Em processo')";
if (mysqli_query($conn, $sql)) {
    echo "<br>Solicitação criada com sucesso!";

} else {
    echo "Erro ao criar solicitação: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<?php
include_once("verificaSession.php");
require "conn.php";
if ($_GET['acao']='excluir' && isset($_GET['id'])){
	$sql="DELETE FROM solicitacoes where id = ".$_GET['id']."";
	$result = mysqli_query($conn, mysqli_escape_string($conn,$sql));
	if ($result) {
		echo("Sucesso");

		}else{
		echo("Erro");
	}
}

?>
<!doctype html>
<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <meta charset="utf-8" />
    <title>document</title>
  </head>
  <body>
    <div class='container'>
      <table class="table table-dark table-striped" style='margin-left: auto; margin-right: auto;'>
        <th>ID</th>
        <th>Tipo</th>
        <th>Descrição</th>
	<th>Usuário</th>
	<th>Ação</th>
        <?php
if ($_SESSION['tipo'] == 1){
	$sql="SELECT*FROM solicitacoes";
}else if ($_SESSION['tipo'] == 0){
	$sql="SELECT*FROM solicitacoes where usuario = '".$_SESSION['logado']."'";
}
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['tipo'] ?></td>
          <td><?= $row['descricao'] ?></td>
	  <td><?= $row['usuario'] ?> </td>
	  <td><a href='index.php?acao=excluir&id=<?=$row['id']?>'>Excluir</a>/<a href='alteraSoli.php?alterar=<?=$row['id']?>'>Alterar</a></td>


        </tr>
        <?php
    }
}
mysqli_close($conn);
?>
      </table>
    </div>
  </body>
</html>

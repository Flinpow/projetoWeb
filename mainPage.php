<?php
include_once("verificaSession.php");
require "conn.php";
if ($_GET['acao']='excluir' && isset($_GET['id'])){
	$sql="DELETE FROM solicitacoes where id = ".$_GET['id']."";
	$result = mysqli_query($conn, mysqli_escape_string($conn,$sql));
	if ($result) { ?>

		<div class="alert alert-dark" role="alert">
  Sua solicitação foi excluida com sucesso!
</div>

<?php
		}else{ ?>
		<div class="alert alert-danger" role="alert">
  Erro ao excluir solicitação!
</div>
<?php
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
    <title>AskForHelp.com</title>
    <h2 style="color: #808080; text-align:center;"> Suas Solicitações</h2>
  </head>
  <body style= "background-color: #0d0d0d;">
    <div class='container'>
      <table class="table table-dark table-striped" style='margin-left: auto; margin-right: auto;'>
        <th>ID</th>
        <th>Tipo</th>
        <th>Descrição</th>
	<th>Usuário</th>
	<th>Ação</th>
  <th>
<div class="btn-group" role="group" aria-label="Grupo de botões com dropdown aninhado">
  <button type="button" class="btn btn-secondary"><a href="criaSolicitacao.php" style="color: #000000">Criar nova solicitação</a></button>
  <button type="button" class="btn btn-secondary"><a href="logout.php" style="color: #000000">Sair</a></button>
</div>
</th>
        <?php
if ($_SESSION['tipo'] == 1){
	$sql="SELECT*FROM solicitacoes";
}else if ($_SESSION['tipo'] == 0){
	$sql="SELECT*FROM solicitacoes where usuario = '".$_SESSION['logado']."'";
}
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  $isEmpty = false;
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['tipo'] ?></td>
          <td><?= $row['descricao'] ?></td>
	  <td><?= $row['usuario'] ?> </td>
	  <td><a href='mainPage.php?acao=excluir&id=<?=$row['id']?>'>Excluir</a>/<a href='alteraSoli.php?alterar=<?=$row['id']?>'>Alterar</a></td>


        </tr>
        <?php
    }
    mysqli_close($conn);
}else{
  $isEmpty = true;
}

?>
      </table>
      <?php 
  if($isEmpty == true){
?>
  <div style="text-align:center"><strong style="color: #808080">Você não possui nenhuma solicitação em aberto :)</strong> </div>
 <?php 
   mysqli_close($conn);
  }
  
 ?>
    </div>
  </body>
  
</html>

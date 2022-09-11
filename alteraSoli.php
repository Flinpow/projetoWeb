<?php
include_once("verificaSession.php");
include_once("conn.php");
if (isset($_GET['alterar'])){
	$sql="SELECT*FROM solicitacoes WHERE id = ".$_GET['alterar']."";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 1) {
		$row=$result -> fetch_assoc();
	}
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
require "conn.php";
function verifica_campo($texto){
  $texto = trim($texto);
  $texto = stripslashes($texto);
  $texto = htmlspecialchars($texto);
  return $texto;
}
$type = verifica_campo($_POST["type"]);
$description = verifica_campo($_POST['description']);
$id=$_POST['id'];

$sql = "UPDATE solicitacoes SET tipo='$type',descricao='$description' where id = $id";
if (mysqli_query($conn, $sql)) {
	header("Location: mainPage.php");
}else{
?>
 <div class="alert alert-danger">
            o Tipo de serviço é obrigatório!
          </div>
<?php
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login PHP</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">Alterar Solicitação</h1>

      <form id="userForm" class="form-horizontal" method="POST" action="">
      
      <div class="form-group">
        <label for="tipo" class="col-sm-2 control-label">Tipo de Serviço</label>
        <div class="col-sm-10">
	        <select required = "" id="tipo" name="type">
			<option <?php if(!isset($_GET['alterar'])){echo('selected');}?>disabled value="" >Selecione</option>
		        <option  <?php if(isset($_GET['alterar'])&& ($row['tipo']=="Conserto")){echo("selected");} ?>value="Conserto">Conserto</option>
		        <option <?php if(isset($_GET['alterar'])&& ($row['tipo']=="Instalação")){echo("selected");} ?>value="Instalação">Instalação</option>
		        <option <?php if(isset($_GET['alterar'])&& ($row['tipo']=="Limpeza")){echo("selected");} ?> value="Limpeza">Limpeza</option>
	        </select>
        </div>
       </div>

        <div class="form-group">
          <label for="description" class="col-sm-2 control-label">Descrição</label>
          <div class="col-sm-10">
		  <textarea placeholder="Adicione uma breve descrição do problema" id="description" name="description" rows="4" cols="50"><?php if(isset($_GET['alterar'])){echo($row['descricao']);} ?></textarea>
          </div>
        </div>
	<input type='text' value='<?= $row['id'] ?>'name='id'style='display:none;' >

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Atualizar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>

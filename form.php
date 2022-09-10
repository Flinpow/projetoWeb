<?php
include_once("verificaSession.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login PHP</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<?php
include_once "conn.php";

function verifica_campo($texto){
  $texto = trim($texto);
  $texto = stripslashes($texto);
  $texto = htmlspecialchars($texto);
  return $texto;
}

// TODO - Válidar se o campo tipo nao esta vazio e validação das senhas.

?>
 <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): 
  $user = $_POST['user'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $confirmaSenha = $_POST['validaSenha'];
  $tipo = $_POST['tipo'];
  ?>
  
  <?php if (isset($user) && isset($email)): ?>
<?php
	$sql = "SELECT 1 FROM usuarios where usuario = '".$user."'";
  	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 0): 
?> 
          <?php if(!isset($tipo)): ?>
            <div class="alert alert-danger">
            o Tipo de conta é obrigatório!
          </div>
          <?php else: ?>
	
          
          <?php if($senha!= $confirmaSenha): ?>
              <div class="alert alert-danger">
            As senhas nao coincidem!
          </div>
          <?php else: ?>
          <?php 
            $user = verifica_campo($user);
            $email = verifica_campo($email);
            $senha = md5($senha); 
            
             $sql = "INSERT INTO usuarios (nome, usuario, email, senha, tipo) VALUES ('$nome', '$user' , '$email'  ,
             '$senha', '$tipo')";
             ?>
	     <?php if (mysqli_query($conn, $sql)):
		$_SESSION['logado'] = $user;
	     	$_SESSION['tipo'] = $tipo;
                $nome = $email = $tipo = "";
		header("Location: index.php");
              ?>
            </ul>
          </div>  
          <?php endif; ?>
          <?php endif; ?>
        <?php endif; ?>
      <?php else: ?>
	<div class="alert alert-danger">
           Usuário já existente! 
          </div>
      <?php endif; ?>
       <?php endif; ?>
      <?php endif; ?>


<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">Criação de Usuário</h1>

      <form id="userForm" class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="form-group">
          <label for="inputNome" class="col-sm-2 control-label">Usuário</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" required="" name="user" placeholder="Usuário" value="">
          </div>
        </div>

        <div class="form-group">
          <label for="inputNome" class="col-sm-2 control-label">Nome</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" required="" name="nome" placeholder="Nome" value="">
          </div>
        </div>


        <div class="form-group">
          <label for="inputEmail" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" required="" name="email" placeholder="Email" value="">
          </div>
        </div>

        <div class="form-group">
          <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" required="" name="senha" placeholder="Senha" value="">
          </div>
        </div>

        <div class="form-group">
          <label for="inputSenha" class="col-sm-2 control-label">Confirmar Senha</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" required="" name="validaSenha" placeholder="Confirmação de Senha" value="">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <label class="radio-inline">
              <input type="radio" checked name="tipo" id="typeUserAdm" value="1" > Administrador
            </label>

            <label class="radio-inline">
              <input type="radio" name="tipo" id="typeUserDef" value="0" > Usuário
            </label>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Enviar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>

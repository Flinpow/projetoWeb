
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
  $tipo = 0;
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
		header("Location: mainPage.php");
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

<body style= "background-color: #0d0d0d;">
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header" style="color: #999999">AskForHelp.com</h1>
      <h3 style="color: #999999">Crie a sua conta em nosso site!</h3>

      <form id="userForm" class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="form-group">
          <label for="inputNome" class="col-sm-2 control-label" style="color: #999999">Usuário</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" required="" name="user" placeholder="Usuário" value="">
          </div>
        </div>

        <div class="form-group">
          <label for="inputNome" class="col-sm-2 control-label" style="color: #999999">Nome</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" required="" name="nome" placeholder="Nome" value="">
          </div>
        </div>


        <div class="form-group">
          <label for="inputEmail" class="col-sm-2 control-label" style="color: #999999">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" required="" name="email" placeholder="Email" value="">
          </div>
        </div>

        <div class="form-group">
          <label for="inputSenha" class="col-sm-2 control-label" style="color: #999999">Senha</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" required="" name="senha" placeholder="Senha" value="">
          </div>
        </div>

        <div class="form-group">
          <label for="inputSenha" class="col-sm-2 control-label" style="color: #999999">Confirmar Senha</label>
          <div class="col-sm-10" style="color: #999999">
            <input type="password" class="form-control" required="" name="validaSenha" placeholder="Confirmação de Senha" value="">
          </div>
        </div>

        <div class="form-group" style="color: #999999">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Enviar</button>
            Já possui uma conta? <a href="login.php">Entrar </a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>



<!DOCTYPE html>
<html>
<head>
  <title>Login PHP</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<?php
include_once "credentials.php";

function verifica_campo($texto){
  $texto = trim($texto);
  $texto = stripslashes($texto);
  $texto = htmlspecialchars($texto);
  return $texto;
}

?>
 <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): 
  $user = $_POST['user'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $confirmaSenha = $_POST['validaSenha'];
  $tipo = $_POST['tipo'];
  ?>
  
        <?php if (isset($user) && isset($email)): ?>
          <?php if(!isset($tipo)): ?>
            <div class="alert alert-danger">
            o Tipo de conta é obrigatório!
          </div>
          <?php else: ?>

          
          <?php if(!$senha === $confirmaSenha): ?>
              <div class="alert alert-danger">
            As senhas nao coincidem!
          </div>
          <?php else: ?>
          <?php 
            $user = verifica_campo($user);
            $email = verifica_campo($email);
            $senha = password_hash($senha, PASSWORD_DEFAULT);
            
            $conn = mysqli_connect($serverHost, $userName, $password, $dbName);
             $sql = "INSERT INTO usuario (nome, email, senha, tipo) VALUES ('$user' , '$email'  ,
             '$senha', '$tipo')";
             ?>
             <?php if (mysqli_query($conn, $sql)): ?> 
              <div class="alert alert-success">
            Dados recebidos com sucesso:
            <ul>
              <li><strong>Nome</strong>: <?php echo $user ?>;</li>
              <li><strong>Email</strong>: <?php echo $email ?>;</li>
              <li><strong>Tipo</strong>: <?php echo $tipo ?>;</li>
              <?php 
                $nome = $email = $tipo = "";
              ?>
            </ul>
          </div>  
          <?php endif; ?>
          <?php endif; ?>
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
              <input type="radio" name="tipo" id="typeUserAdm" value="adm" > Administrador
            </label>

            <label class="radio-inline">
              <input type="radio" name="tipo" id="typeUserDef" value="usuário" > Usuário
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
<?php
session_start();
if (isset($_SESSION['logado'])){
	header("Location: index.php");
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
  $senha = $_POST['senha'];
  ?>
  
        <?php if (isset($user)): ?>
          <?php 
            $user = verifica_campo($user);
            $senha = md5($senha); 
            
             $sql = "SELECT * FROM usuarios WHERE usuario = '".$user."' and senha = '".$senha."'";
		$result = mysqli_query($conn, $sql);
		     if (mysqli_num_rows($result) == 1) {
	    while($row = mysqli_fetch_assoc($result)) {


		     $_SESSION['logado']=$row['usuario'];
	    	     $_SESSION['tipo']=$row['tipo']; 
		     header("Location: index.php");
		}
		     }else{
		?>
		<div class="alert alert-danger">
           	Usuário ou senha incorretos; 
          </div>
<?php
		     }
	     ?>
              <?php 
                $nome = $email = $tipo = "";
              ?>
            </ul>
          </div>  
          <?php endif; ?>
          <?php endif; ?>


<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">Login</h1>

      <form id="userForm" class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="form-group">
          <label for="inputNome" class="col-sm-2 control-label">Usuário</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" required="" name="user" placeholder="Usuário" value="">
          </div>
        </div>


        <div class="form-group">
          <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" required="" name="senha" placeholder="Senha" value="">
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

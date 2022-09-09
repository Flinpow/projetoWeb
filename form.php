

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
      <h1 class="page-header">Criação de Usuário</h1>

      <form id="userForm" class="form-horizontal" method="POST" action="teste.php">

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
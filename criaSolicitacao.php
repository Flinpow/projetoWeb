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
      <h1 class="page-header">Cadastro de Solicitação</h1>

      <form id="userForm" class="form-horizontal" method="POST" action="confirmaSolic.php">
      
      <div class="form-group">
        <label for="tipo" class="col-sm-2 control-label">Tipo de Serviço</label>
        <div class="col-sm-10">
	        <select required = "" id="tipo" name="type">
                <option value="default">Selecione</option>
		        <option value="Concerto">Concerto</option>
		        <option value="Instalação">Instalação</option>
		        <option value="Limpeza">Limpeza</option>
	        </select>
        </div>
       </div>

        <div class="form-group">
          <label for="description" class="col-sm-2 control-label">Descrição</label>
          <div class="col-sm-10">
            <textarea placeholder="Adicione uma breve descrição do problema" id="description" name="description" rows="4" cols="50"></textarea>
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

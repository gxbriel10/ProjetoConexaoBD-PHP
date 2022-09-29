<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CADASTRO DE FUNCIONÁRIO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="js/buscaCep.js"> </script>
  </head>
<body>
	<div class="container">
  		<div class="row">
    		<div class="col">
      			
    		</div>
    		<div class="col">
      			<div class="mb-3">
      				<h1 class="bg-primary text-white">Cadastro de Funcionário</h1>

      				<form action="#" method="POST">
	  					<label class="form-label">Nome:</label>
	  					<input type="text" class="form-control" id="nomeCliente" name="nomeFunc">
	  					<label class="form-label">CPF:</label>
	  					<input type="text" class="form-control" id="cpfCliente" name="cpfFunc">
	  					<label class="form-label">RG:</label>
	  					<input type="text" class="form-control" id="rgCliente" name="rgFunc">
	  					<label class="form-label">CEP:</label>
	  					<input type="text" class="form-control" id="cep" name="cepFunc" onblur="pesquisacep(this.value);">
	  					<label class="form-label">Rua:</label>
	  					<input type="text" class="form-control" id="rua" name="ruaFunc">
	  					<label class="form-label">Bairro:</label>
	  					<input type="text" class="form-control" id="bairro" name="bairroFunc">
	  					<label class="form-label">Cidade:</label>
	  					<input type="text" class="form-control" id="cidade" name="cidadeFunc">
	  					<label class="form-label">Estado:</label>
	  					<input type="text" class="form-control" id="uf" name="ufFunc">
	  					<label class="form-label">Nº:</label>
	  					<input type="text" class="form-control" id="numCliente" name="numFunc">
	  					<label class="form-label">Celular:</label>
	  					<input type="text" class="form-control" id="celularCliente" name="celularFunc">
	  					<label class="form-label">Email:</label>
	  					<input type="text" class="form-control" id="emailCliente" name="emailFunc">
	  					<br>
	  					<div class="text-center">
	  						<input type="submit" name="Cadastrar" class="btn btn-primary">
	  						<input type="reset" name="Limpar" class="btn btn-danger">
	  					</div>
					</form>
				</div>
    		</div>
    		<div class="col">
      			
    		</div>
  		</div>
	</div>
</body>
</html>


<?php
if(!empty($_POST))
{
	$nome = $_POST['nomeFunc'];
	$cpf = $_POST['cpfFunc'];
	$rg = $_POST['rgFunc'];
	$cep = $_POST['cepFunc'];
	$num = $_POST['numFunc'];
	$celular = $_POST['celularFunc'];
	$email = $_POST['emailFunc'];

	include_once('conexao.php');

	try {
	  
	  $stmt = $conn->prepare("INSERT INTO funcionario (nome, cpf, rg, cep, num, celular, email)
	  	                      VALUES (:nome, :cpf, :rg, :cep, :num, :celular, :email)");

	  $stmt->bindParam(':nome', $nome);
	  $stmt->bindParam(':cpf', $cpf);
	  $stmt->bindParam(':rg', $rg);
	  $stmt->bindParam(':cep', $cep);
	  $stmt->bindParam(':num', $num);
	  $stmt->bindParam(':celular', $celular);
	  $stmt->bindParam(':email', $email);
	  
	  $stmt->execute();

	  echo "<script>alert('Cadastrado com Sucesso');</script>";

	} catch(PDOException $e) {
	  echo "Erro ao cadastrar: " . $e->getMessage();
	}
	$conn = null;
}
?>
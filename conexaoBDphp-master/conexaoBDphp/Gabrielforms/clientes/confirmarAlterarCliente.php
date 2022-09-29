<?php

include_once('../conexao.php');

$cod = $_POST['cod'];
$primeironm = $_POST['firstname'];
$sobrenome = $_POST['lastname'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$genero = $_POST['gender'];

	try 
	{

		$stmt = $connection->prepare("UPDATE tb_cliente SET nm_primeiro = :primeironm,
													  nm_sobrenome = :sobrenome,
													  nr_cpf = :cpf,
													  nr_rg = :rg,
													  nr_cep = :cep,
                                                      nr_endereco = :endereco,
                                                      nr_celular = :tel,
                                                      nm_email = :email,
													  id_genero = :genero WHERE cd_cliente = :id");

		$stmt->execute(array(
							 ':id' => $cod,
							 ':primeironm' => $primeironm,
							 ':sobrenome' => $sobrenome,
							 ':cpf' => $cpf,
							 ':rg' => $rg,
							 ':cep' => $cep,
							 ':endereco' => $endereco,
							 ':tel' => $tel,
                             ':email' => $email,
                             ':genero' => $genero));
		
		header( "refresh:0;url=consultaCliente.php" );

		echo "<script>alert('CLIENTE ALTERADO COM SUCESSO');</script>";


	} 

	catch(PDOException $e) 

	{

		echo 'Error: ' . $e->getMessage();

	}

	

 ?>

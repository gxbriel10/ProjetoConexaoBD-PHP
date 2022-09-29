<?php

include_once('../conexao.php');


$cod = $_POST['cod'];
$primeironm = $_POST['firstname'];
$sobrenome = $_POST['lastname'];
$dataNasc = $_POST['dataa'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];		
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$pais = $_POST['country'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$genero = $_POST['gender'];

try 
{

	$stmt = $connection->prepare("UPDATE tb_funcionario SET nm_primeiro = :primeironm,
												  nm_sobrenome = :sobrenome,
												  dt_nasc = :dataNasc,
												  nr_cpf = :cpf,
												  nr_rg = :rg,
												  nr_cep = :cep,
												  nr_endereco = :endereco,
												  nm_pais = :pais,
												  nr_celular = :tel,
												  nm_email = :email,
												  id_genero = :genero WHERE cd_funcionario = :id");

	$stmt->execute(array(
						 ':id' => $cod,
						 ':primeironm' => $primeironm,
						 ':sobrenome' => $sobrenome,
						 ':dataNasc' => $dataNasc,
						 ':cpf' => $cpf,
						 ':rg' => $rg,
						 ':cep' => $cep,
						 ':endereco' => $endereco,
						 ':pais' => $pais,
						 ':tel' => $tel,
						 ':email' => $email,
						 ':genero' => $genero));
	
		
		header( "refresh:0;url=consultaFuncionario.php" );

		echo "<script>alert('FUNCIONARIO ALTERADO COM SUCESSO');</script>";


	} 

	catch(PDOException $e) 

	{

		echo 'Error: ' . $e->getMessage();

	}

	

 ?>

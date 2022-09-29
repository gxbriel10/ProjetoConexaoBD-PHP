<?php

include_once('../conexao.php');

$cod = $_POST['cod'];
$primeironm = $_POST['firstname'];
$sobrenome = $_POST['lastname'];
$cnpj = $_POST['cnpj'];
$empresa = $_POST['empresa'];
$produto = $_POST['produto'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$pais = $_POST['country'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$genero = $_POST['gender'];

	try 
	{

		$stmt = $connection->prepare("UPDATE tb_fornecedor SET nm_primeiro = :primeironm,
													  nm_sobrenome = :sobrenome,
													  nr_cnpj = :cnpj,
													  nm_empresa = :empresa,
													  tp_produto = :produto,
													  nr_cep = :cep,
                                                      nr_endereco = :endereco,
                                                      nm_pais = :pais,
                                                      nr_celular = :tel,
                                                      nm_email = :email,
													  id_genero = :genero WHERE cd_fornecedor = :id");

		$stmt->execute(array(
							 ':id' => $cod,
							 ':primeironm' => $primeironm,
							 ':sobrenome' => $sobrenome,
							 ':cnpj' => $cnpj,
							 ':empresa' => $empresa,
							 ':produto' => $produto,
							 ':cep' => $cep,
							 ':endereco' => $endereco,
							 ':pais' => $pais,
							 ':tel' => $tel,
                             ':email' => $email,
                             ':genero' => $genero));
		
		header( "refresh:0;url=consultaFornecedor.php" );

		echo "<script>alert('FORNECEDOR ALTERADO COM SUCESSO');</script>";


	} 

	catch(PDOException $e) 

	{

		echo 'Error: ' . $e->getMessage();

	}

	

 ?>

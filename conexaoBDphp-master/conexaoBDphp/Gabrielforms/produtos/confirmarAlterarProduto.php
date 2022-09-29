<?php

include_once('../conexao.php');

$cod = $_POST['cod'];
$nome = $_POST['produto'];
$categoria = $_POST['categoria'];
$valor = $_POST['valor'];
$quantidade = $_POST['quantidade'];
$empresa = $_POST['empresa'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$produto = $_POST['gender'];

	try 
	{

		$stmt = $connection->prepare("UPDATE tb_produto SET nm_produto = :nome,
													  nm_categoria = :categoria,
													  vl_produto = :valor,
													  qt_produto = :quantidade,
													  nm_empresa = :empresa,
                                                      nr_cnpj = :cnpj,
                                                      nm_email = :email,
													  id_produto = :produto WHERE cd_produto = :id");

		$stmt->execute(array(
			 				 ':id' => $cod,
							 ':nome' => $nome,
							 ':categoria' => $categoria,
							 ':valor' => $valor,
							 ':quantidade' => $quantidade,
							 ':empresa' => $empresa,
							 ':cnpj' => $cnpj,
							 ':email' => $email,
                             ':produto' => $produto));
		
		header( "refresh:0;url=consultaProduto.php" );

		echo "<script>alert('PRODUTO ALTERADO COM SUCESSO');</script>";


	} 

	catch(PDOException $e) 

	{

		echo 'Error: ' . $e->getMessage();

	}

	

 ?>

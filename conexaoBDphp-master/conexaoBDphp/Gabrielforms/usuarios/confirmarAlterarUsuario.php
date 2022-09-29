<?php

include_once('../conexao.php');

$cod = $_POST['cod'];
$primeironm = $_POST['firstname'];
$sobrenome = $_POST['lastname'];
$perfil = $_POST['perfil'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$tel = $_POST['tel'];
$loginn = $_POST['usuario'];
$senha = $_POST['password'];
$genero = $_POST['gender'];


	try 
	{

		$stmt = $connection->prepare("UPDATE tb_usuario SET nm_primeiro = :primeironm,
													  nm_sobrenome = :sobrenome,
													  id_perfil = :perfil,
													  nm_email = :email,
                                                      nr_endereco = :endereco,
                                                      nr_celular = :tel,
													  nm_usuario = :loginn,
													  nm_senha = :senha,
													  id_genero = :genero WHERE cd_usuario = :id");

    $stmt->execute(array(
		':id' => $cod,
        ':primeironm' => $primeironm,
        ':sobrenome' => $sobrenome,
        ':perfil' => $perfil,
        ':email' => $email,
        ':endereco' => $endereco,
        ':tel' => $tel,
        ':loginn' => $loginn,
        ':senha' => $senha,
        ':genero' => $genero));
		
		header( "refresh:0;url=consultaUsuario.php" );

		echo "<script>alert('USUÁRIO ALTERADO COM SUCESSO');</script>";


	} 

	catch(PDOException $e) 

	{

		echo 'Error: ' . $e->getMessage();

	}

 ?>

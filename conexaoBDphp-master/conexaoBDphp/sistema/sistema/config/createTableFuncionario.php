<?php
$servername = "localhost:3307";
$username = "root";
$password = "usbw";
$dbname = "sistema";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to create table
  $sql = "create table funcionario(codigo int PRIMARY KEY AUTO_INCREMENT,
                     nome varchar(50) not null,
                     cpf varchar(20) not null,
                     rg varchar(20) not null,
                     cep varchar(20) not null,
                     numero varchar(10) not null,
					 celular varchar(20) not null,
                     email varchar(40) not null)";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Tabela Funcionario criado com sucesso";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
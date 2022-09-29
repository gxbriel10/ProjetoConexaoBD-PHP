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
  $sql = "create table produto(codigo int PRIMARY KEY AUTO_INCREMENT,
                     nome varchar(50) not null,
                     tipo varchar(20) not null,
                     dataCompra varchar(20) not null,
                     dataVencimento varchar(20) not null,
                     valorCompra varchar(10) not null,
					 valorVenda varchar(20) not null,
                     fornecedor int not null)";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Tabela Produto criado com sucesso";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
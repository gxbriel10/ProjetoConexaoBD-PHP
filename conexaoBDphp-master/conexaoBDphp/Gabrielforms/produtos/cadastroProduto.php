<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>CADASTRO PRODUTO</title>
    <style>
                @media screen and (max-width: 1337px) {
    .form-img {
        display: none;
    }

    .container {
        width: 50%;
    }

    .form {
        width: 100%;
    }
}

@media screen and (max-width: 1064px) {
    .container {
        width: 90%;
        height: auto;
    }

    .input-group {
        flex-direction: column;
        overflow-y: scroll;
        flex-wrap: nowrap;
        max-height: 10rem;
        padding-right: 5rem;
    }

    .gender-inputs {
        margin-top: 2rem;
    }

    .gender-group{
        flex-direction: column;
    }

    .gender-input {
        margin-top: 0.5rem;
    }
}
    </style>
</head>
<body>
    <div class="container">
        <div class="form-img">
            <img src="../assets/img/undraw_logistics_x-4-dc.svg" >
        </div>
        <div class="form">
            <form action="#" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>CADASTRE UM PRODUTO</h1>
                    </div>
                    <div class="login-button">
                        <button onclick="javascript:location.href ='../../../menu.php';"><a href="#">VOLTAR</a></button>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="produto">NOME PRODUTO</label>
                        <input type="text" id="produto" name="produto" placeholder="Digite o nome do produto" required>
                    </div>

                    <div class="input-box">
                        <label for="categoria">CATEGORIA</label>
                        <input type="text" id="categoria" name="categoria" placeholder="Digite a categoria" required>
                    </div>

                    <div class="input-box">
                        <label for="valor">VALOR</label>
                        <input type="number" id="valor" name="valor" placeholder="Digite seu valor R$"  required/>
                    </div>

                    <div class="input-box">
                        <label for="quantidade">QUANTIDADE</label>
                        <input type="number" id="quantidade" name="quantidade" placeholder="Digite sua quantidade" required>
                    </div>

                    <div class="input-box">
                        <label for="empresa">NOME EMPRESA</label>
                        <input type="text" id="empresa" name="empresa" placeholder="Digite o nome da empresa" required>
                    </div>

                    <div class="input-box">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" id="cnpj" name="cnpj" placeholder="Digite seu cnpj" oninput="mascara(this, 'cnpj')" required/>
                    </div>

                    <div class="input-box">
                        <label for="email">EMAIL</label>
                        <input type="text" id="email" name="email" placeholder="Digite seu email" required>
                    </div>
                </div>

                    

                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>PRODUTO</h6>
                    </div>
                    <div class="gender-group">
                        <div class="gender-input">
                            <input type="radio" id="P" name="gender" value="PERECÍVEL">
                            <label for="P">PERECÍVEL</label>
                        </div>
                        <div class="gender-input">
                            <input type="radio" id="naoP" name="gender" value="NÃO PERECÍVEL">
                            <label for="naoP">NÃO PERECÍVEL</label>
                        </div>
                        <div class="gender-input">
                            <input type="radio" id="outros" name="gender" value="OUTROS">
                            <label for="outros">OUTROS</label>
                        </div>
                        <div class="gender-input">
                            <input type="radio" id="nada" name="gender" value="PREFIRO NÃO DIZER">
                            <label for="nada">PREFIRO NÃO DIZER</label>
                        </div>
                    </div>
                </div>
                <div class="continue-button">
                    <button><a href="#">CADASTRAR</a></button>
                </div>
            </form>
        </div>
    </div>
    <script src="../index.js"></script>
</body>
</html>

<?php

	if(!empty($_POST))
	{
		$nome = $_POST['produto'];
        $categoria = $_POST['categoria'];
        $valor = $_POST['valor'];
		$quantidade = $_POST['quantidade'];
        $empresa = $_POST['empresa'];
        $cnpj = $_POST['cnpj'];
        $email = $_POST['email'];
        $produto = $_POST['gender'];
		
		include_once('../conexao.php');

        try{
            $stmt = $connection->prepare("INSERT INTO tb_produto (nm_produto, nm_categoria, vl_produto, qt_produto, nm_empresa, nr_cnpj, nm_email, id_produto)
            VALUES (:nome, :categoria, :valor, :quantidade, :empresa, :cnpj, :email, :produto)");

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':empresa', $empresa);
            $stmt->bindParam(':cnpj', $cnpj);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':produto', $produto);

            $stmt->execute();

            echo "<script>alert('Cadastrado com Sucesso');</script>";
        }  catch(PDOException $e) {
            echo "Erro ao cadastrar: " . $e->getMessage();
          }
          $connection = null;
		
		
	}


?>
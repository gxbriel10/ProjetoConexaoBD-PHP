<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="/Gabrielforms/validaCPF.js"> </script>
    <title>CADASTRO CLIENTE</title>
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
            <img src="../assets/img/undraw_join_re_w1lh.svg" >
        </div>
        <div class="form">
            <form action="#" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>CADASTRE-SE CLIENTE</h1>
                    </div>
                    <div class="login-button">
                        <button onclick="javascript:location.href ='../../../menu.php';"><a href="#">VOLTAR</a></button>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">PRIMEIRO NOME</label>
                        <input type="text" id="firstname" name="firstname" placeholder="Digite seu primeiro nome" required>
                    </div>

                    <div class="input-box">
                        <label for="lastname">SOBRENOME</label>
                        <input type="text" id="lastname" name="lastname" placeholder="Digite seu sobrenome" required>
                    </div>

                    <div class="input-box">
                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" name="cpf" placeholder="Digite seu cpf" onblur="TestaCPF(this.value);" required/>
                    </div>

                    <div class="input-box">
                        <label for="rg">RG</label>
                        <input type="text" id="rg" name="rg" placeholder="Digite seu rg" required>
                    </div>

                    <div class="input-box">
                        <label for="cep">CEP</label>
                        <input type="text" id="cep" name="cep" placeholder="Digite seu cep" oninput="mascara(this, 'cep')" required>
                    </div>

                    <div class="input-box">
                        <label for="endereco">ENDEREÇO</label>
                        <input type="text" id="endereco" name="endereco" placeholder="Digite seu endereco" required>
                    </div>

                    <div class="input-box">
                        <label for="tel">CELULAR</label>
                        <input type="text" id="tel" name="tel" placeholder="(xx) xxxx-xxxx" oninput="mascara(this, 'tel')" required>
                    </div>

                    <div class="input-box">
                        <label for="email">EMAIL</label>
                        <input type="text" id="email" name="email" placeholder="Digite seu email" required>
                    </div>
            
                </div>

                    

                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>GÊNERO</h6>
                    </div>
                    <div class="gender-group">
                        <div class="gender-input">
                            <input type="radio" id="feminino" name="gender" value="FEMININO">
                            <label for="feminino">FEMININO</label>
                        </div>
                        <div class="gender-input">
                            <input type="radio" id="masculino" name="gender" value="MASCULINO">
                            <label for="masculino">MASCULINO</label>
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
        $primeironm = $_POST['firstname'];
        $sobrenome = $_POST['lastname'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $cep = $_POST['cep'];
        $endereco = $_POST['endereco'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $genero = $_POST['gender'];


        include_once('../conexao.php');

        try {
            $stmt = $connection->prepare("INSERT INTO tb_cliente (nm_primeiro, nm_sobrenome, nr_cpf, nr_rg, nr_cep, nr_endereco, nr_celular, nm_email, id_genero)
            VALUES (:primeironm, :sobrenome, :cpf, :rg, :cep, :endereco, :tel, :email, :genero)");

            $stmt->bindParam(':primeironm', $primeironm);
            $stmt->bindParam(':sobrenome', $sobrenome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':rg', $rg);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':endereco', $endereco);
            $stmt->bindParam(':tel', $tel);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':genero', $genero);

            $stmt->execute();

            echo "<script>alert('Cadastrado com Sucesso');</script>";
      
          } catch(PDOException $e) {
            echo "Erro ao cadastrar: " . $e->getMessage();
          }
          $connection = null;
    }

?>
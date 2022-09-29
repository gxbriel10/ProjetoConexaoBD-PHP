<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="/Gabrielforms/validaCPF.js"> </script>
    <title>ALTERAR CLIENTE</title>
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
<?php

$cod = $_GET['id'];

include_once('../conexao.php');
 
    $select = $connection->prepare("SELECT * FROM tb_cliente where cd_cliente=$cod");
    $select->execute();

    $row = $select->fetch();
    
?>
    <div class="container">
        <div class="form-img">
            <img src="../assets/img/undraw_profile_details_re_ch9r.svg" >
        </div>
        <div class="form">
            <form action="confirmarAlterarCliente.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>ALTERAR CLIENTE</h1>
                    </div>
                    <div class="login-button">
                        <button onclick="javascript:location.href ='consultaCliente.php';"><a href="#">VOLTAR</a></button>
                    </div>
                </div>
                <div class="input-group">
                    
                    <div class="input-box">
                        <label for="cod">CÓDIGO</label>
                        <input type="text" id="cod" name="cod"  value="<?php echo $row['cd_cliente'];?>" readonly="true">
                    </div>

                    <div class="input-box">
                        <label for="firstname">PRIMEIRO NOME</label>
                        <input type="text" id="firstname" name="firstname" placeholder="Digite seu primeiro nome" value="<?php echo $row['nm_primeiro'];?>"  required>
                    </div>

                    <div class="input-box">
                        <label for="lastname">SOBRENOME</label>
                        <input type="text" id="lastname" name="lastname" placeholder="Digite seu sobrenome" value="<?php echo $row['nm_sobrenome'];?>" required>
                    </div>

                    <div class="input-box">
                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" name="cpf" placeholder="Digite seu cpf" onblur="TestaCPF(this.value);" value="<?php echo $row['nr_cpf'];?>" required/>
                    </div>

                    <div class="input-box">
                        <label for="rg">RG</label>
                        <input type="text" id="rg" name="rg" placeholder="Digite seu rg" value="<?php echo $row['nr_rg'];?>" required>
                    </div>

                    <div class="input-box">
                        <label for="cep">CEP</label>
                        <input type="text" id="cep" name="cep" placeholder="Digite seu cep" oninput="mascara(this, 'cep')" value="<?php echo $row['nr_cep'];?>" required>
                    </div>

                    <div class="input-box">
                        <label for="endereco">ENDEREÇO</label>
                        <input type="text" id="endereco" name="endereco" placeholder="Digite seu endereco" value="<?php echo $row['nr_endereco'];?>" required>
                    </div>

                    <div class="input-box">
                        <label for="tel">CELULAR</label>
                        <input type="text" id="tel" name="tel" placeholder="(xx) xxxx-xxxx" oninput="mascara(this, 'tel')" value="<?php echo $row['nr_celular'];?>" required>
                    </div>

                    <div class="input-box">
                        <label for="email">EMAIL</label>
                        <input type="text" id="email" name="email" placeholder="Digite seu email" value="<?php echo $row['nm_email'];?>" required>
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
                    <button><a href="#">ALTERAR</a></button>
                </div>
            </form>
        </div>
    </div>
    <script src="../index.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>ALTERAR USUÁRIO</title>
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
 
 $select = $connection->prepare("SELECT * FROM tb_usuario where cd_usuario=$cod");
 $select->execute();

 $row = $select->fetch();
 
?>
    <div class="container">
        <div class="form-img">
            <img src="../assets/img/undraw_user_flow_re_bvfx.svg" >
        </div>
        <div class="form" >
            <form action="confirmarALterarUsuario.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>ALTERAR USUÁRIO</h1>
                    </div>
                    <div class="login-button">
                        <button onclick="javascript:location.href ='consultaUsuario.php';"><a href="#">VOLTAR</a></button>
                    </div>
                </div>
                <div class="input-group">
                <div class="input-box">
                        <label for="cod">CÓDIGO</label>
                        <input type="text" id="cod" name="cod" value="<?php echo $row['cd_usuario'];?>" readonly="true">
                    </div>
                    <div class="input-box">
                        <label for="firstname">PRIMEIRO NOME</label>
                        <input type="text" id="firstname" name="firstname" placeholder="Digite seu primeiro nome" value="<?php echo $row['nm_primeiro'];?>" required>
                    </div>

                    <div class="input-box">
                        <label for="lastname">SOBRENOME</label>
                        <input type="text" id="lastname" name="lastname" placeholder="Digite seu sobrenome" value="<?php echo $row['nm_sobrenome'];?>" required>
                    </div>

                    <div class="input-box">
                        <label for="perfil">SELECIONE SEU PERFIL</label>
                        <select  id="perfil" id="perfil" name="perfil"  placeholder="Selecione seu perfil" required>
                            <option value="" selected="selected">Selecione seu perfil</option>
                            <option value="Cliente">CLIENTE</option>
                            <option value="Fornecedor">FORNECEDOR</option>
                          </select>
                    </div>

                    <div class="input-box">
                        <label for="email">EMAIL</label>
                        <input type="text" id="email" name="email" placeholder="Digite seu email" value="<?php echo $row['nm_email'];?>" required>
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
                        <label for="usuario">NOME DE USUÁRIO</label>
                        <input type="text" id="usuario" name="usuario" placeholder="Digite seu nome de usuario" value="<?php echo $row['nm_usuario'];?>" required>
                    </div>
 
                    <div class="input-box">
                        <label for="password">SENHA</label>
                        <input type="password" id="password" name="password" placeholder="Digite sua Senha" value="<?php echo $row['nm_senha'];?>" required>
                    </div>

 
                    <div class="input-box">
                        <label for="Confirmepassword">CONFIRME SUA SENHA</label>
                        <input type="password" id="Confirmepassword" name="Confirmepassword" placeholder="Digite sua Senha" value="<?php echo $row['nm_senha'];?>" required>
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


<!DOCTYPE html>
<html lang="pt-br"> 
<head>
    <meta charset="utf-8">
    <title>Atualizando os dados</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
    <!-- atualizando os dados -->
    <div class="form">
        <h2>Atualizando dados: </h2>
        <form action="" method="post">
            <strong>Nome do usuário</strong><br>
            <?php
            require 'db_connection.php';
            $get_user = mysqli_query($conn,"SELECT * FROM `usuarios`");
            $row = mysqli_fetch_assoc($get_user);
            ?>
            <input type="text" autocomplete="off" name="nome" placeholder="Digite seu nome completo"></input>

            <strong>Email</strong><br>
            <input type="email" autocomplete="off" name="login" placeholder="Digite seu email"></input><br>
            <input type="password" autocomplete="off" name="senha" placeholder="Digite sua nova senha"></input>
            <input type="submit" value="atualizar">
            

        </form>
    </div>
    <!-- Fim do update -->
    </div>
    </body>
</html>

<?php
require 'db_connection.php';
if(isset($_POST['nome']) && isset($_POST['login'])){
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $check_nome = mysqli_query($conn, "SELECT nome FROM usuarios WHERE nome = '$nome'");
    $check_login = mysqli_query($conn, "SELECT login FROM usuarios WHERE login = '$login'");
    if (mysqli_num_rows($check_nome) > 0) {
        if (mysqli_num_rows($check_login) > 0) {
            $update_query = mysqli_query($conn,"UPDATE usuarios SET senha='$senha' WHERE login='$login'");
            if($update_query){
                echo "<script>
                alert('Dados Atualizados');
                window.location.href = 'index.php';
                </script>";
                exit;
            }else{
                echo "<h3>Ops... Algo de errado não está certo</h3>";
            }
        }else{
            echo "<script>
            alert('Senha incorreta');
            window.location.href = 'index.php';
            </script>";
            exit;
        }
    }else{
        echo "<script>
        alert('Login não identificado');
        window.location.href = 'index.php';
        </script>";
        exit;
    }
}
//fim da atualização de dados

?> 
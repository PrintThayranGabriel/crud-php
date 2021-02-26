<?php

require 'db_connection.php';
$login = $_POST['login'];
$senha = $_POST['senha'];
$check_login = mysqli_query($conn, "SELECT login FROM usuarios WHERE login = '$login'");
$check_senha = mysqli_query($conn, "SELECT senha FROM usuarios WHERE senha = '$senha'");
if (mysqli_num_rows($check_login) > 0) {
    if (mysqli_num_rows($check_senha) > 0) {
        echo "<script>
        alert('Cadastrado com sucesso!');
        window.location.href = 'index.php';
        </script>";
        exit;
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
?>

<html>
    <head>

    </head>
    <body>

    </body>
</html>

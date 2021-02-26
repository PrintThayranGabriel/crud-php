<?php
require 'db_connection.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])){

    $userid = $_GET['id'];
    $delete_user = mysqli_query($conn,"DELETE FROM `usuarios` WHERE  id='$userid'");

    if ($delete_user){
        echo "<script>
        alert('Dados Apagados!');
        window.location.href = 'index.php';
        </script>";
        exit;
    }else{
        echo "Opps... Algo deu errado";
    }
}else{
    //definir o código de resposta do cabeçalho
    http_response_code(404);
    echo "<h1>Erro 404. Página não encontrada</h1>";
}
?>
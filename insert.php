<?php
    require 'db_connection.php';
    if(isset($_POST['login']) && isset($_POST['senha'])) {
        //verifica se os campos de nome de usuario e email estao vazios
        if(!empty($_POST['login']) && !empty($_POST['senha'])) {
            //ignorando "escapando" caracteres especiais 
            $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['nome']));
            $user_nascimento = mysqli_real_escape_string($conn, htmlspecialchars($_POST['nascimento']));
            $user_cpf = mysqli_real_escape_string($conn, htmlspecialchars($_POST['cpf']));
            $user_login = mysqli_real_escape_string($conn, htmlspecialchars($_POST['login']));
            $user_senha = mysqli_real_escape_string($conn, htmlspecialchars($_POST['senha']));

            //verificando se o e-mail é valido
            if (filter_var($user_login, FILTER_VALIDATE_EMAIL)) {
                //verificando se o e-mail ja existe
                $check_login = mysqli_query($conn, "SELECT `login` FROM `usuarios` WHERE  = '$user_login'");
                if (mysqli_num_rows($check_login) > 0) {
                    echo "<h3>Esse login ja existe, tente outro nome</h3>";
                } else
                    {
                        //Inserindo dados na tabela USUARIOS do banco de dados
                        $insert_query = mysqli_query($conn,"INSERT INTO `usuarios`(nome,nascimento,cpf,login,senha) VALUES('$username','$user_nascimento','$user_cpf','$user_login','$user_senha')");
                        //Verificando se os dados foram inseridos
                        if($insert_query) {
                            echo "<script>
                            alert('Dados Inseridos');
                            window.location.href = 'index.php';
                            </script>";
                            exit;
                        } else
                            {
                                echo "<h3>Ops... Algo de errado aconteceu! Tente outra vez!</h3>";
                            }
                    }
            } else
                {
                    echo "Endereço de e-mail invalido. Por favor, insira um endereço de e-mail valido.";
                }
        } else
            {
                echo "<h4>Por favor preencha todos os campos.</h4>";
            }
    } else
        {
            //Definindo o codigo de resposta do cabeçalho
            http_response_code(404);
            echo "<h1>Error 404. Pagina nao encontrada!</h1>";
        }
?>
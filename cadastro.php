<?php
require 'db_connection.php';
// função para buscar os dados da base de dados
function get_all_data($conn){
   $get_data = mysqli_query($conn,"SELECT * FROM `usuarios`");
   if(mysqli_num_rows($get_data) > 0){
       echo '<table>
             <tr>
               <th>Nome do usuário</th>
               <th>Nascimento</th>
               <th>CPF</th>
               <th>Email</th>
               <th>Senha</th>
             </tr>';
       while($row = mysqli_fetch_assoc($get_data)){

           echo '<tr>
           <td>'.$row['nome'].'</td>
           <td>'.$row['nascimento'].'</td>
           <td>'.$row['cpf'].'</td>
           <td>'.$row['login'].'</td>
           <td>'.$row['senha'].'</td>
           </tr>';

       }
       echo '</table>';
     }else{
       echo "<h3>Nenhum registro encontrado. Por favor insira alguns registros.</h3>";
    }
}
?>
<!DOCTYPE html> 
<head>
<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicação CRUD</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>

   <div class="container">

      <!-- inserinuo os dados
    nome, data denascimento,CPF , login e senha
    -->
    <div class="form">
        <h2>Primeiro acesso? Cadastre-se</h2>
     

        <form action="insert.php" method="post">
            <strong>Nome</strong><br>
            <input type="text" name="nome" placeholder="Nome" required><br> 

            <strong>Data de nascimento</strong><br>
            <input type="date" name="nascimento" placeholder="Nome" required><br> 

            <strong>CPF</strong><br>
            <input type="number" name="cpf" placeholder="Digite somente os numeros" required><br> 

            <strong>Login</strong><br>
            <input type="text" name="login" placeholder="Login" required><br> 

            <strong>Senha</strong><br>
            <input type="password" name="senha" placeholder="Senha" required><br> 

            <input type="submit" value="Cadastrar">
            <a href="index.php">Já se cadastrou? fazer login</a>
          
        </form>
    </div>
     
      <?php
        get_all_data($conn);
      ?>

   </div>
</body> 
</html>



<?php
require 'db_connection.php';
// função para buscar os dados da base de dados
function get_all_data($conn){
   $get_data = mysqli_query($conn,"SELECT * FROM `usuarios`");
   if(mysqli_num_rows($get_data) > 0){
       echo '<table>
             <tr>
               <th>Nome do usuário</th>
               <th>Email</th>
               <th>Ação</th>
             </tr>';
       while($row = mysqli_fetch_assoc($get_data)){

           echo '<tr>
           <td>'.$row['nome'].'</td>
           <td>'.$row['login'].'</td>
           <td>
           <a href="update.php?id='.$row['id'].'">Alterar</a> 
           <a href="delete.php?id='.$row['id'].'">Apagar</a> 
           </td>
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

      <!-- inserindo os dados  -->
    <div class="form">
        <h2 class="text">Faça login para continuar </h2>

            <div id="logo png">
              <img id="imagem" src="imagens/login.png" alt="">
            </div>  

            
            <form action="login.php" method="post">

            <strong class="text">Login</strong><br>
            <input type="text" name="login" placeholder="Login" required><br> 

            <strong class="text">Senha</strong><br>
            <input type="password" name="senha" placeholder="Senha" required><br> 

            <input type="submit" value="Fazer Login">

            <a id="cadastro" href="cadastro.php" >Cadastre-se</a><br>

            <a id="esqueciasenha" href="update.php" class="text">Esqueceu a senha?</a><br><br> 


            </form>
        
    </div>
   

      <!-- <?php
        get_all_data($conn);
      ?>  -->

   </div>
</body> 
</html>



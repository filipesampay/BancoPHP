<?php
   //Dados para o login no banco de dados phpmyadmin
   $servername = "localhost";
   $username = "usuario";
   $password = "senha123";
   $dbname = "banco";
   
   // Criar a conexão
   $conn = mysqli_connect($servername, $username, $password, $dbname);
   
   // Verificar a conexão
   if (!$conn) {
      die("A conexão falhou: " . mysqli_connect_error());
   }
?>

<?php //ITEM 3: Excluir conta corrente específica;

   $numero_da_conta = $_GET['numero_da_conta'];

   // Preparar o SQL para excluir dados da tabela
   // O WHERE define a condição para excluir a conta corrente específica, com base no número da conta corrente.
   $sql = "DELETE FROM conta_corrente WHERE numero_da_conta = '$numero_da_conta'";
   
   // Executar o SQL e verificar o resultado
   if (mysqli_query($conn, $sql)) {
      echo "Dados excluídos com sucesso da tabela conta_corrente!<br/>";
   } else {
      echo "Erro ao excluir dados da tabela conta_corrente: " . mysqli_error($conn);
   }
?>
<?php
   //Dados para o login no banco de dados phpmyadmin
   $servername = "localhost";
   $username = "usuario";
   $password = "senha123";
   $dbname = "banco";
   
   // Criar a conexão
   $conn = mysqli_connect($servername, $username, $password, $dbname);
   
?>  

<?php //ITEM 7:  Listar todas as contas de um banco;
    $nome_do_banco=$_GET['nome_do_banco'];
   // Preparar o SQL para selecionar dados da tabela
   $sql = "SELECT * FROM conta_corrente WHERE nome_do_banco = '$nome_do_banco'";
   
   // Executar o SQL e guardar o resultado em uma variável
   $result = mysqli_query($conn, $sql);
   
   // Verificar o resultado
   if (mysqli_num_rows($result) > 0) {
      // Loop para exibir cada linha de resultado
      while($row = mysqli_fetch_assoc($result)) {
         echo "Nome do cliente: " . $row['nome_do_cliente']. " | CPF: " . $row['CPF']. " | Endereço: " . $row['endereco']. " | Número da conta: " . $row['numero_da_conta']. " | Número da agência: " . $row['numero_da_agencia']. " | Banco: " . $row['nome_do_banco']."<br>";
      }
   } else {
      echo "Nenhuma conta encontrada para o banco especificado.";
   }
?>
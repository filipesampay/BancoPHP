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

<?php //ITEM 5: Pesquisar contas por dados do cliente (nome);
    $nome_do_cliente=$_GET['nome_do_cliente'];
   // Preparar o SQL para pesquisar dados na tabela
   // O WHERE define a condição para pesquisar as contas correntes específicas com base no nome do cliente.
   $sql = "SELECT * FROM conta_corrente WHERE nome_do_cliente = '$nome_do_cliente' ";
   
   // Executar o SQL e obter o resultado
   $result = mysqli_query($conn, $sql);
   
   // Verificar se houve resultados na pesquisa
   if (mysqli_num_rows($result) > 0) {
      // Mostrar os resultados na forma de uma tabela
      echo "<table><tr><th>Nome do cliente</th><th>CPF</th><th>Endereço</th><th>Número da conta</th><th>Número da agência</th></tr>";
      while($row = mysqli_fetch_assoc($result)) {
         echo "<tr><td>" . $row['nome_do_cliente']. "</td><td>" . $row["CPF"]. "</td><td>" . $row['endereco']. "</td><td>" . $row['numero_da_conta']. "</td><td>" . $row["numero_da_agencia"]. "</td></tr>";
      }
      echo "</table>";
   } else {
      echo "Nenhum resultado encontrado para a pesquisa.<br/>";
   }
?>
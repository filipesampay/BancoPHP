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

<?php //ITEM 1: Criar bancos financeiros informando o nome do banco, o número da agência que esse 
// banco representa, o endereço e a bandeira (itaú, bradesco, caixa econômica, etc...);

   //DADOS RECEBIDOS do html
   $nome_do_banco = $_GET['nome_do_banco'];
   $numero_da_agencia = $_GET['numero_da_agencia'];
   $endereco = $_GET['endereco'];
   $bandeira = $_GET['bandeira'];

   // Aqui você pode usar as variáveis para processar ou armazenar os dados
   // Preparar o SQL para inserir dados na tabela
   //A consulta está inserindo dados na tabela bancos_financeiros, que tem quatro colunas: nome_do_banco, numero_da_agencia, endereco, e bandeira.
   //A função VALUES define os valores a serem inseridos nas colunas.
   $sql = "INSERT INTO bancos_financeiros (nome_do_banco, numero_da_agencia, endereco, bandeira)
   VALUES ('$nome_do_banco', $numero_da_agencia, '$endereco', '$bandeira')";
   
   // Executar o SQL e verificar o resultado
   if (mysqli_query($conn, $sql)) {
      echo "Dados inseridos com sucesso!<br/>";
   } else {
      echo "Erro ao inserir dados: " . mysqli_error($conn);
   }
?>
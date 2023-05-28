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

<?php //ITEM 2:  Criar conta corrente informando dados do cliente nome, CPF, endereço, número da conta, número da agência;

   //DADOS RECEBIDOS do html
   $nome_do_cliente = $_GET['nome_do_cliente'];
   $CPF = $_GET['CPF'];
   $endereco = $_GET['endereco'];
   $nome_do_banco=$_GET['nome_do_banco'];
   $numero_da_conta = $_GET['numero_da_conta'];
   $numero_da_agencia = $_GET['numero_da_agencia'];
   $saldo_da_conta = 0;

    // Preparar o SQL para inserir dados na tabela
   $sql = "INSERT INTO conta_corrente (nome_do_banco, nome_do_cliente, CPF, endereco, numero_da_conta, numero_da_agencia, saldo_da_conta)
   VALUES ('$nome_do_banco', '$nome_do_cliente', '$CPF', '$endereco', $numero_da_conta, $numero_da_agencia, $saldo_da_conta)";

   if (mysqli_query($conn, $sql)) {
      echo "Conta criada com sucesso!<br/>";
   } else {
      echo "Erro ao criar a conta!" . mysqli_error($conn);
   }
?>
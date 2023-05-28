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

<?php

   $valor_da_transferencia=$_GET['valor_da_transferencia'];
   $numero_da_conta_origem=$_GET['numero_da_conta_origem'];
   $numero_da_conta_destino=$_GET['numero_da_conta_destino'];
   




    // Query para buscar as informações das contas de origem e destino
    $sql_conta_origem = "SELECT nome_do_banco FROM conta_corrente WHERE numero_da_conta = '$numero_da_conta_origem'"; //Pega o numero da conta de origem
    $sql_conta_destino = "SELECT nome_do_banco FROM conta_corrente WHERE numero_da_conta = '$numero_da_conta_destino'"; //Pega o numero da conta de destino
    
    // Executar as queries
    $result_origem = mysqli_query($conn, $sql_conta_origem); //$sql_conta_origem assim por padrao pois e uma string de consulta do SQL
    $result_destino = mysqli_query($conn, $sql_conta_destino); //$sql_conta_destino assim por padrao pois e uma string de consulta do SQL
    
    // Armazenar o banco de cada conta
    $banco_origem = mysqli_fetch_assoc($result_origem)['nome_do_banco'];//Puxa o banco dessa da conta de origem
    $banco_destino = mysqli_fetch_assoc($result_destino)['nome_do_banco'];//Puxa o banco da conta de destino
    
    // Verificar se o banco da conta de origem é o mesmo que o banco da conta de destino
    if ($banco_origem == $banco_destino) {

        // Preparar o SQL para atualizar o saldo da conta de origem
        //A função WHERE define a condição para encontrar a conta corrente de origem, com base no número da conta corrente.
        //A função SET define o novo valor do saldo, subtraindo o valor da transferência.
        $sqlorigem = "UPDATE conta_corrente SET saldo_da_conta = saldo_da_conta - '$valor_da_transferencia' WHERE numero_da_conta = '$numero_da_conta_origem'";
        


        // Preparar o SQL para atualizar o saldo da conta de destino
        //A função WHERE define a condição para encontrar a conta corrente de destino, com base no número da conta corrente.
        //A função SET define o novo valor do saldo, somando o valor da transferência.
        $sqldestino = "UPDATE conta_corrente SET saldo_da_conta = saldo_da_conta + '$valor_da_transferencia' WHERE numero_da_conta = '$numero_da_conta_destino'";
        
        // Executar o SQL e verificar o resultado
        if (mysqli_query($conn, $sqlorigem)) {
            //echo "Dados atualizados com sucesso na tabela conta_corrente!<br/>";
        } else {
            //echo "Erro ao atualizar dados na tabela conta_corrente: " . mysqli_error($conn);
        }

        // Executar o SQL e verificar o resultado
        if (mysqli_query($conn, $sqldestino)) {
            echo "Transferencia realizada!<br/>";
        } else {
            echo "Erro ao transferir!! " . mysqli_error($conn);
        }
        

    }
    mysqli_close($conn);
?>
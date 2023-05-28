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
    $numero_da_conta=$_GET['conta']; //Pega o numero da conta para realizar a operacao nela
    $valor=$_GET['valor'];//Pega o valor a ser utilizado na operacao

    if (isset($_GET['operacao'])) {
        $operacao = $_GET['operacao'];

        switch ($operacao) {

          case "saque"://CASO A PESSOA TENHA ESCOLHIDO O SAQUE

            // *Preparar o SQL para fazer um saque
            // OBS: Saques não podem exceder o saldo de uma conta;

            $verifica_saldo = "SELECT saldo_da_conta FROM conta_corrente WHERE numero_da_conta = '$numero_da_conta'";
            $resultado = mysqli_query($conn, $verifica_saldo);

            if(mysqli_num_rows($resultado) > 0){
                $retorno = mysqli_fetch_assoc($resultado);
                if($retorno['saldo_da_conta'] < $valor){
                    echo "Saldo insuficiente na conta para saque!";
                    break;
                }else{
                    $sql = "UPDATE conta_corrente SET saldo_da_conta = saldo_da_conta - $valor WHERE numero_da_conta = '$numero_da_conta'";
                }
            }
            
   
            // Executar o SQL e verificar o resultado
            if (mysqli_query($conn, $sql)) {
                echo "Saque realizado com sucesso na conta corrente!<br/>";
            } else {
                echo "Erro ao realizar saque na conta corrente!" . mysqli_error($conn);
            }

            break;



          case "deposito"://CASO A PESSOA TENHA ESCOLHIDO DEPOSITO

            // *Preparar o SQL para fazer um depósito
            // Obs:  Depósitos não podem receber valor nulo (zero) ou negativo;
            if($valor <= 0 || $valor == NULL){
                echo "Erro ao realizar depósito na conta corrente: " . mysqli_error($conn);
                break;
            }
            // Executar o SQL e verificar o resultado
            if (mysqli_query($conn, $sql)) {
                echo "Depósito realizado com sucesso na conta corrente!<br/>";
            } else {
                echo "Erro ao realizar depósito na conta corrente! " . mysqli_error($conn);
            }

            break;
       
        }
    }
?>
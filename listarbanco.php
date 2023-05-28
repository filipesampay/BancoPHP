<?php
    //Esse arquivo é somente PHP.
   //Dados para o login no banco de dados phpmyadmin
   $servername = "localhost";
   $username = "usuario";
   $password = "senha123";
   $dbname = "banco";
   
   // Criar a conexão
   $conn = mysqli_connect($servername, $username, $password, $dbname);
   
?>  

<?php //ITEM 7:  Listar todos os bancos;

   // Preparar a query SQL para listar todos os bancos
$sql = "SELECT nome_do_banco, bandeira FROM bancos_financeiros ";

// Executar a query
$result = mysqli_query($conn, $sql);

// Verificar se a consulta retornou resultados
if (mysqli_num_rows($result) > 0) {
    // Loop através dos resultados e exibir as informações de cada banco
    while($row = mysqli_fetch_assoc($result)) {
        echo "Nome do banco: " . $row["nome_do_banco"] . " - Bandeira: " . $row["bandeira"] . "<br>";
    }
} else {
    echo "Não foram encontrados resultados";
}

// Fechar a conexão
mysqli_close($conn);

?>
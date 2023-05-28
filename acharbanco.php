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
 // Nome/Bandeira a ser buscado
$search = $_GET['nome_ou_bandeira'];

// Query para buscar os dados do banco com base no Nome ou na Bandeira
$sql = "SELECT * FROM bancos_financeiros WHERE nome_do_banco LIKE '%$search%' OR bandeira LIKE '%$search%'";

// Executar a query
$result = mysqli_query($conn, $sql);

// Verificar se a query retornou dados
if (mysqli_num_rows($result) > 0) {
    // Exibir os dados encontrados 
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Nome do Banco: " . $row["nome_do_banco"] . "<br>";
        echo "Bandeira: " . $row["bandeira"] . "<br>";
        echo "<br>";
    }
} else {
    // Exibir mensagem de erro se nenhum dado for encontrado
    echo "Nenhum resultado encontrado para a pesquisa: " . $search;
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);

?>
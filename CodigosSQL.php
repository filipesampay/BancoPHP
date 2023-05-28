Codigo tabela bancos_financeiros:
CREATE TABLE bancos_financeiros (
   id INT PRIMARY KEY AUTO_INCREMENT,
   nome_do_banco VARCHAR(50),
   numero_da_agencia INT,
   endereco VARCHAR(100),
   bandeira VARCHAR(20)
)

Codigo tabela conta_corrente:
CREATE TABLE conta_corrente(
   id INT PRIMARY KEY AUTO_INCREMENT,
   nome_do_banco VARCHAR(50),
   nome_do_cliente VARCHAR(40),
   CPF VARCHAR(14),
   endereco VARCHAR(100),
   numero_da_conta INT,
   numero_da_agencia INT,
   saldo_da_conta FLOAT
)
   
<?php
// Configurações do banco de dados
$servername = "localhost"; // servidor do banco de dados (padrão: localhost)
$username = "root"; // usuário do banco de dados do PHPMyAdmin (padrão: root)
$password = ""; // senha do banco de dados do PHPMyAdmin (padrão: vazio)
$dbname = "Tassia"; // nome do banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Criação da tabela "agendamento" se ainda não existir
$sql = "CREATE TABLE IF NOT EXISTS agendamento (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100) NOT NULL,
    Telefone VARCHAR(20) NOT NULL,
    Data DATE NOT NULL,
    Procedimento VARCHAR(50) NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    echo "Erro ao criar tabela: " . $conn->error;
}

// Obtendo os dados do formulário
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$data = $_POST['data'];
$procedimento = $_POST['procedimentos'];

// Inserindo os dados na tabela "agendamento"
$sql = "INSERT INTO agendamento (Nome, Telefone, Data, Procedimento)
        VALUES ('$nome', '$telefone', '$data', '$procedimento')";

if ($conn->query($sql) === TRUE) {
    echo "Agendamento salvo com sucesso!";
} else {
    echo "Erro ao salvar o agendamento: " . $conn->error;
}

// Fechando a conexão com o banco de dados
$conn->close();
?>


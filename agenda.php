

<html>
<head>
<title>Tassia Sena Biomédica Esteticista</title>
<meta charset="utf-8">
<link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="tassia.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="jquery-3.6.0.js"></script>
<script src="javascript.js"></script>

<style>
body {
  background-color: #BC8F8F;
  background-image: url("background/fundo.png");
}

.center-div {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: pink;
}

.form-container {
  text-align: center;
}
</style>

</head>

<body>
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" href="index.php">Home</a>
          <a class="nav-link active" href="cuidados.php">Cuidados</a>
          <a class="nav-link active" href="agenda.php">Agenda</a>
          <a class="nav-link active" href="localizacao.php">Localização</a>
          <a class="nav-link active" href="sobre_mim.php">Sobre mim!</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="w-100 p-3" style="background-color: #eee;">
    <div class="center-div">
      <div class="form-container">
        <h2>Agendamento</h2>
        <form action="agendar.php" method="POST">
          <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Nome" id="nome" name="nome">
            </div>
          </div>

          <div class="form-group row">
            <label for="telefone" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input type="tel" class="form-control" placeholder="Telefone" id="telefone" name="telefone">
            </div>
          </div>

          <div class="form-group row">
            <label for="data" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="data" name="data">
            </div>
          </div>

          <div class="form-group row">
            <label for="procedimentos" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <select class="form-control" id="procedimentos" name="procedimentos">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary">Agendar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

<FOOTER><h> By @Tais_decampos<h3></FOOTER>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // O formulário foi submetido, execute o código de inserção no banco de dados
    
    // Configurações do banco de dados
    $servername = "localhost"; // substitua pelo nome do servidor do seu banco de dados
    $username = "root"; // substitua pelo nome de usuário do seu banco de dados
    $password = ""; // substitua pela senha do seu banco de dados
    $dbname = "Tassia"; // substitua pelo nome do seu banco de dados
    
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
        
        // Enviar email com os dados
        $to = "taiscampos2118@gmail.com"; // Endereço de email de destino
        $subject = "Novo agendamento"; // Assunto do email
        $message = "Novo agendamento realizado:\n\n" .
                   "Nome: " . $nome . "\n" .
                   "Telefone: " . $telefone . "\n" .
                   "Data: " . $data . "\n" .
                   "Procedimento: " . $procedimento;
        $headers = "From: seu_email@example.com"; // Endereço de email do remetente
        
        // Envio do email
        if (mail($to, $subject, $message, $headers)) {
            echo "Email enviado com sucesso!";
        } else {
            echo "Erro ao enviar o email.";
        }
    } else {
        echo "Erro ao salvar o agendamento: " . $conn->error;
    }
    
    // Fechando a conexão com o banco de dados
    $conn->close();
}
?>

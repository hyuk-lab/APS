<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Função para criar a tabela, se não existir
function criarTabela($conn) {
    $sql = "CREATE TABLE IF NOT EXISTS dahora (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        endereco VARCHAR(255) NOT NULL,
        logradouro VARCHAR(100),
        numero VARCHAR(10),
        bairro VARCHAR(100),
        cidade VARCHAR(100),
        estado VARCHAR(50),
        cep VARCHAR(20),
        celular VARCHAR(20),
        sexo VARCHAR(10),
        cpf VARCHAR(14),
        profissao VARCHAR(100)
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Tabela 'dahora' verificada ou criada com sucesso!<br>";
    } else {
        die("Erro ao criar a tabela: " . $conn->error);
    }
}

// Chamar a função para criar a tabela
criarTabela($conn);

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar os dados do formulário
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $endereco = $conn->real_escape_string($_POST['endereco']);
    $logradouro = $conn->real_escape_string($_POST['logradouro']);
    $numero = $conn->real_escape_string($_POST['numero']);
    $bairro = $conn->real_escape_string($_POST['bairro']);
    $cidade = $conn->real_escape_string($_POST['cidade']);
    $estado = $conn->real_escape_string($_POST['estado']);
    $cep = $conn->real_escape_string($_POST['cep']);
    $celular = $conn->real_escape_string($_POST['celular']);
    $sexo = $conn->real_escape_string($_POST['sexo']);
    $cpf = $conn->real_escape_string($_POST['cpf']);
    $profissao = $conn->real_escape_string($_POST['profissao']);
    

    // Criar a consulta SQL para inserir os dados
    $sql = "INSERT INTO dahora (nome, email, endereco, logradouro, numero, bairro, cidade, estado, cep, celular, sexo, cpf, profissao)
            VALUES ('$nome', '$email', '$endereco', '$logradouro', '$numero', '$bairro', '$cidade', '$estado', '$cep', '$celular', '$sexo', '$cpf', '$profissao')";



    echo $sql;

    
    // Executar a consulta
    if ($conn->query($sql) === TRUE) {
        echo "Novo registro inserido com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>

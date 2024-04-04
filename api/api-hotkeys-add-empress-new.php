<?php

// VAR
$empresa = "";
$nome = "";
$cnpj = "";

// O QUE VAI ACONTECER

// Captura o valor do parâmetro 'empresa' da URL, se presente
if(isset($_GET['empresa'])) {
    $empresa = $_GET['empresa'];
} else {
    $empresa = ""; // Define um valor padrão caso o parâmetro 'empresa' não esteja presente na URL
}

// Captura o valor do parâmetro 'nome' da URL, se presente
if(isset($_GET['nome'])) {
    $nome = $_GET['nome'];
} else {
    $nome = ""; // Define um valor padrão caso o parâmetro 'nome' não esteja presente na URL
}

// Captura o valor do parâmetro 'cnpj' da URL, se presente
if(isset($_GET['cnpj'])) {
    $cnpj = $_GET['cnpj'];
} else {
    $cnpj = ""; // Define um valor padrão caso o parâmetro 'cnpj' não esteja presente na URL
}


// COMO VAI ACONTECER

// Conexão com o banco de dados
try {
    $pdo = new PDO('mysql:host=seu_host;dbname=seu_banco_de_dados', 'seu_usuario', 'sua_senha');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}

// Prepara a declaração SQL para inserir os dados
$stmt = $pdo->prepare("INSERT INTO sua_tabela (empresa, nome, cnpj) VALUES (:empresa, :nome, :cnpj)");

// Executa a declaração SQL, vinculando os parâmetros
$stmt->bindParam(':empresa', $empresa);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':cnpj', $cnpj);

// COMO VAI ACABAR

try {
    $stmt->execute();
    echo "Dados inseridos com sucesso.";
} catch (PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}

// QUAL VAI SER O LINK

//https://api.fuzio.futurize-host.online/api-hotkeys-add-empress-new.php?empresa=1111&nome=futurize&cnpj=50082267000143
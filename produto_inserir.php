<?php

include_once("Connection.php");

//Recebe os nome e cidade do time por parâmetro GET
if(! isset($_GET['descricao']) || ! isset($_GET['un_medida'])) {
    echo "Informe os parâmetros GET 'descricao' e 'un_medida'!";
    exit;
}

$descricao = $_GET['descricao'];
$un_medida = $_GET['un_medida'];

//Pega a conexão com a base de dados e cria a statement para inserir o time
$conn = Connection::getConnection();

$sql = "INSERT INTO produtos (descricao, un_medida) VALUES (?, ?)";
$stm = $conn->prepare($sql);
$stm->execute([$descricao, $un_medida]);

echo "Produto inserido no banco de dados!";
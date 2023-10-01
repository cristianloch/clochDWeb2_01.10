<?php

require_once("Connection.php");


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID inválido! <br>";
    echo "<a href='produto_listar.php'>Voltar</a>";
    exit;
}

$id = $_GET['id'];

//Executar a exclusão no banco de dados;
$conn = Connection::getConnection();

$sql = "DELETE FROM produtos WHERE id = ?"; //id igual a um parametro
$stm = $conn->prepare($sql);
$stm->execute([$id]); //vou passar como array por isso []

header("location: produto_listar.php");

?>


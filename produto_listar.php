<?php

require_once("Connection.php");

$conn = Connection::getConnection();

//$sql = "SELECT id, nome, cidade FROM times "; 
// comando SELECT ... o que quer ser selecioado ... FROM ...lugar... WHERE
//com * quem dizer que sao todos os campos
$sql = "SELECT * FROM produtos";

$stm = $conn->prepare($sql);
$stm->execute();

$result = $stm->fetchAll();
//echo "<pre>" . print_r($result, true) . "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Unidade de Medida</th>
        </tr>
        <?php foreach($result as $r): ?>
            <tr>
                <td><?=$r["id"]?></td>
                <td><?=$r["descricao"]?></td>          
                <td><?=$r["un_medida"]?></td>
                <td><a href="produto_excluir.php?id=<?=$r["id"]?>"
                onclick="return confirm('Confirma a exclusão?')"
                >Excluir</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
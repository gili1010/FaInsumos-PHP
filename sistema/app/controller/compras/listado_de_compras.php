<?php


$sql_compras ="SELECT * from tb_compras";
$query_compras= $pdo->prepare($sql_compras);
$query_compras->execute();
$compras_datos=$query_productos->fetchAll(PDO::FETCH_ASSOC);
?>
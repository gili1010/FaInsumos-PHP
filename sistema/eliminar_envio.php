<?php
if (!empty($_GET['id'])) {
    require("../conexion.php");
    $codventa = $_GET['id'];
    $query_delete = mysqli_query($conexion, "DELETE FROM envios WHERE IdVenta = $codventa");
    mysqli_close($conexion);
    header("location: lista_Envios.php");
}
?>
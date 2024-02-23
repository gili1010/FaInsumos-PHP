<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['Direccion'])) {
    $alert = '<div class="alert alert-primary" role="alert">
              Todo los campos son requeridos
            </div>';
  } else {
    $idenvio = $_GET['id'];
    $Direccion = $_POST['Direccion'];
    $estado = $_POST['estado'];
    $query_update = mysqli_query($conexion, "UPDATE envios SET Direccion = '$Direccion', estado = '$estado' WHERE IdVenta = $idenvio");
    if ($query_update) {
      $alert = '<div class="alert alert-primary" role="alert">
              Modificado
            </div>';
    } else {
      $alert = '<div class="alert alert-primary" role="alert">
                Error al Modificar
              </div>';
    }
  }
}

// Validar producto

if (empty($_REQUEST['id'])) {
  header("Location: lista_Envios.php");
} else {
  $id_envio = $_REQUEST['id'];
  if (!is_numeric($id_envio)) {
    header("Location: lista_Envios.php");
  }
  $query_producto = mysqli_query($conexion, "SELECT e.IdVenta,e.IdCliente,f.Fecha, e.Direccion, e.estado,c.nombre,c.dni,f.totalfactura 
  FROM envios as e 
  inner Join cliente as c on c.idcliente = e.IdCliente
  inner join factura as f on f.nofactura = e.IdVenta
  WHERE e.IdVenta = $id_envio");
  $result_envio = mysqli_num_rows($query_producto);

  if ($result_envio > 0) {
    $data_producto = mysqli_fetch_assoc($query_producto);
  } else {
    header("Location: lista_Envios.php");
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">

      <div class="card">
        <div class="card-header bg-primary text-white">
          Modificar Envio
        </div>
        <div class="card-body">
          <form action="" method="post">
            <?php echo isset($alert) ? $alert : ''; ?>
            <div class="form-group">
           <label for="codventa">Codigo Venta</label>
           <input type="text" placeholder="Ingrese  Codigo de la venta" name="codventa" disabled="true" id="codventa" class="form-control" value="<?php echo $data_producto['IdVenta']; ?>">
         </div>
         <div class="form-group">
           <label for="Nombrecliente">Nombre Cliente</label>
           <input type="text" placeholder="Ingrese Nombre Cliente" class="form-control" name="Nombrecliente" disabled="true" id="Nombrecliente" value="<?php echo $data_producto['nombre']; ?>">
         </div>
         <div class="form-group">
           <label for="dnicliente">DNI Cliente</label>
           <input type="text" placeholder="Ingrese DNI Cliente" class="form-control" name="dnicliente" disabled="true" id="dnicliente" value="<?php echo $data_producto['dni']; ?>">
         </div>
         <div class="form-group">
           <label for="direccion">Dirección</label>
           <input type="text" placeholder="Ingrese Dirección" class="form-control" name="Direccion" id="direccion" value="<?php echo $data_producto['Direccion']; ?>">
         </div>
         <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control" name="estado" id="estado">
                <option value="Pendiente de envio" <?php if($data_producto['estado'] == 'Pendiente de envio') echo 'selected'; ?>>Pendiente de envío</option>
                <option value="Enviado" <?php if($data_producto['estado'] == 'Enviado') echo 'selected'; ?>>Enviado</option>
                <option value="Entregado" <?php if($data_producto['estado'] == 'Entregado') echo 'selected'; ?>>Entregado</option>
            </select>
        </div>
            <input type="submit" value="Actualizar Envio" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>
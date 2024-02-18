<?php include_once "includes/header.php";
  include "../conexion.php";
  if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['codventa']) || empty($_POST['codcliente']) || $_POST['codcliente'] <  0 || empty($_POST['direccion'] || $_POST['direccion'] <  0) || empty($_POST['estado'])) {
      $alert = '<div class="alert alert-danger" role="alert">
                Todo los campos son obligatorios
              </div>';
    } else {
      $codventa = $_POST['codventa'];
      $codcliente = $_POST['codcliente'];
      $direccion = $_POST['direccion'];
      $estado = $_POST['estado'];

      $query_insert = mysqli_query($conexion, "INSERT INTO envios(IdVenta,IdCliente,Direccion,estado) values ('$codventa', '$codcliente', '$direccion','$estado')");
      if ($query_insert) {
        $alert = '<div class="alert alert-primary" role="alert">
                Envio Registrado
              </div>';
      } else {
        $alert = '<div class="alert alert-danger" role="alert">
                Error al registrar el Envio
              </div>';
      }
    }
  }
  ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
     <a href="lista_Envios.php" class="btn btn-primary">Regresar</a>
   </div>

   <!-- Content Row -->
   <div class="row">
     <div class="col-lg-6 m-auto">
       <form action="" method="post" autocomplete="off">
         <?php echo isset($alert) ? $alert : ''; ?>
         <div class="form-group">
           <label for="codventa">Codigo Venta</label>
           <input type="text" placeholder="Ingrese  Codigo de la venta" name="codventa" id="codventa" class="form-control">
         </div>
         <div class="form-group">
           <label for="codcliente">Codigo Cliente</label>
           <input type="text" placeholder="Ingrese Codigo Cliente" class="form-control" name="codcliente" id="codcliente">
         </div>
         <div class="form-group">
           <label for="direccion">Dirección</label>
           <input type="text" placeholder="Ingrese Dirección" class="form-control" name="direccion" id="direccion">
         </div>
         <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control" name="estado" id="estado">
                <option value="Pendiente de envio">Pendiente de envío</option>
                <option value="Enviado">Enviado</option>
                <option value="Entregado">Entregado</option>
            </select>
        </div>
         <input type="submit" value="Guardar" class="btn btn-primary">
       </form>
     </div>
   </div>


 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
 <?php include_once "includes/footer.php"; ?>
<?php
session_start();

// Verificar si el usuario no está logueado o no tiene el rol adecuado
if (empty($_SESSION['nombre']) || $_SESSION['rol'] != 1) {
  // Si no está logueado o no tiene el rol adecuado, redirigir al cierre de sesión
  header('Location: index.php');

  exit;
}

?>
<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['producto']) || empty($_POST['precio']) || empty($_POST['detalleProducto']) || empty($_POST['marca'])) {
    $alert = '<div class="alert alert-primary" role="alert">
              Todo los campos son requeridos
            </div>';
  } else {
    $codproducto = $_GET['id'];
    $proveedor = $_POST['proveedor'];
    $producto = $_POST['producto'];
    $detalleProducto = $_POST['detalleProducto'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $query_update = mysqli_query($conexion, "UPDATE producto SET descripcion = '$producto', detalleProducto = '$detalleProducto', marca = '$marca', precio= $precio WHERE codproducto = $codproducto");
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
  header("Location: lista_productos.php");
} else {
  $id_producto = $_REQUEST['id'];
  if (!is_numeric($id_producto)) {
    header("Location: lista_productos.php");
  }
  $query_producto = mysqli_query($conexion, "SELECT p.codproducto, p.descripcion, p.detalleProducto, p.marca, p.precio, 
  pr.codproveedor, pr.proveedor 
  FROM producto p 
  INNER JOIN proveedor pr 
  ON p.proveedor = pr.codproveedor
   WHERE p.codproducto = $id_producto");
  $result_producto = mysqli_num_rows($query_producto);

  if ($result_producto > 0) {
    $data_producto = mysqli_fetch_assoc($query_producto);
  } else {
    header("Location: lista_productos.php");
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">

      <div class="card">
        <div class="card-header bg-primary text-white">
          Modificar producto
        </div>
        <div class="card-body">
          <form action="" method="post">
            <?php echo isset($alert) ? $alert : ''; ?>
            <div class="form-group">
              <label for="nombre">Proveedor</label>
              <?php $query_proveedor = mysqli_query($conexion, "SELECT * FROM proveedor ORDER BY proveedor ASC");
              $resultado_proveedor = mysqli_num_rows($query_proveedor);
              mysqli_close($conexion);
              ?>
              <select id="proveedor" name="proveedor" class="form-control">
                <option value="<?php echo $data_producto['codproveedor']; ?>" selected><?php echo $data_producto['proveedor']; ?></option>
                <?php
                if ($resultado_proveedor > 0) {
                  while ($proveedor = mysqli_fetch_array($query_proveedor)) {
                    // code...
                ?>
                    <option value="<?php echo $proveedor['codproveedor']; ?>"><?php echo $proveedor['proveedor']; ?></option>
                <?php
                  }
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="producto">Producto</label>
              <input type="text" class="form-control" placeholder="Ingrese nombre del producto" name="producto" id="producto" value="<?php echo $data_producto['descripcion']; ?>">
            </div>
            <div class="form-group">
              <label for="producto">Detalle de producto</label>
              <input type="text" class="form-control" placeholder="Ingrese detalle de prodcuto" name="detalleProducto" id="detalleProducto" value="<?php echo $data_producto['detalleProducto']; ?>">
            </div>
            <div class="form-group">
              <label for="producto">Marca</label>
              <input type="text" class="form-control" placeholder="Ingrese marca" name="marca" id="marca" value="<?php echo $data_producto['marca']; ?>">
            </div>
            <div class="form-group">
              <label for="precio">Precio</label>
              <input type="text" placeholder="Ingrese precio" class="form-control" name="precio" id="precio" value="<?php echo $data_producto['precio']; ?>">


            </div>
            <input type="submit" value="Actualizar Producto" class="btn btn-primary">
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
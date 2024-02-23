<?php
session_start();

// Verificar si el usuario no está logueado o no tiene el rol adecuado
if (empty($_SESSION['nombre']) || $_SESSION['rol'] == 2) {
	// Si no está logueado o no tiene el rol adecuado, redirigir al cierre de sesión
	header('Location: index.php');

	exit;
}

?>
<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
	$alert = "";
	if (empty($_POST['proveedor']) || empty($_POST['producto']) || empty($_POST['precio']) || $_POST['precio'] <  0 || empty($_POST['cantidad'] || $_POST['cantidad'] <  0)) {
		$alert = '<div class="alert alert-danger" role="alert">
                Todo los campos son obligatorios
              </div>';
	} else {
		$proveedor = $_POST['proveedor'];
		$producto = $_POST['producto'];
		$detalleProducto = $_POST['detalleProducto'];
		$marca = $_POST['marca'];
		$precio = $_POST['precio'];
		$cantidad = $_POST['cantidad'];
		$usuario_id = $_SESSION['idUser'];

		$query_insert = mysqli_query($conexion, "INSERT INTO producto(proveedor,descripcion,detalleProducto,marca,precio,existencia,usuario_id) values ('$proveedor', '$producto','$detalleProducto','$marca','$precio', '$cantidad','$usuario_id')");
		if ($query_insert) {
			$alert = '<div class="alert alert-primary" role="alert">
                Producto Registrado
              </div>';
		} else {
			$alert = '<div class="alert alert-danger" role="alert">
                Error al registrar el producto
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
		<a href="lista_productos.php" class="btn btn-primary">Regresar</a>
	</div>

	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-6 m-auto">
			<form action="" method="post" autocomplete="off">
				<?php echo isset($alert) ? $alert : ''; ?>
				<div class="form-group">
					<label>Proveedor</label>
					<?php
					$query_proveedor = mysqli_query($conexion, "SELECT codproveedor, proveedor FROM proveedor ORDER BY proveedor ASC");
					$resultado_proveedor = mysqli_num_rows($query_proveedor);
					mysqli_close($conexion);
					?>
					<select id="proveedor" name="proveedor" class="form-control">
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
					<input type="text" placeholder="Ingrese nombre del producto" name="producto" id="producto" class="form-control">
				</div>
				<div class="form-group">
					<label for="producto">Detalle de Producto</label>
					<input type="text" placeholder="Ingrese detalle del producto" name="detalleProducto" id="detalleProducto" class="form-control">
				</div>
				<div class="form-group">
					<label for="producto">Marca</label>
					<input type="text" placeholder="Ingrese marca del producto" name="marca" id="marca" class="form-control">
				</div>
				<div class="form-group">
					<label for="precio">Precio</label>
					<input type="text" placeholder="Ingrese precio" class="form-control" name="precio" id="precio">
				</div>

				<div class="form-group">
					<label for="cantidad">Cantidad</label>
					<input type="number" placeholder="Ingrese cantidad" class="form-control" name="cantidad" id="cantidad">
				</div>
				<input type="submit" value="Guardar Producto" class="btn btn-primary">
			</form>
		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>
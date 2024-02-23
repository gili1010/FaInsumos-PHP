<?php
session_start();

// Verificar si el usuario no está logueado o no tiene el rol adecuado
if (empty($_SESSION['nombre']) || $_SESSION['rol'] != 1) {
	// Redirigir al usuario a la página de inicio de sesión o cerrar sesión
	header('Location: index.php');
	exit;
}
?>

<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Panel de Administración | Listado Compras</h1>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>Nro Compra</th>
							<th>Fecha de compra</th>
							<th>Proveedor</th>
							<th>Comprobante</th>
							<th>Usuario</th>
							<th>Producto</th>
							<th>Precio Compra</th>
							<th>Cantidad</th>

						</tr>
					</thead>
					<tbody>
						<?php
						require "../conexion.php";
						$query = mysqli_query($conexion, "SELECT nro_compra,fecha_compra,codproveedor,comprobante,idusuario,codproducto,precio_compra,cantidad  FROM tb_compras ORDER BY nro_compra DESC");
						mysqli_close($conexion);
						$cli = mysqli_num_rows($query);

						if ($cli > 0) {
							while ($dato = mysqli_fetch_array($query)) {
						?>
								<tr>
									<td><?php echo $dato['nro_compra']; ?></td>
									<td><?php echo $dato['fecha_compra']; ?></td>
									<td><?php echo $dato['codproveedor']; ?></td>
									<td><?php echo $dato['comprobante']; ?></td>
									<td><?php echo $dato['idusuario']; ?></td>
									<td><?php echo $dato['codproducto']; ?></td>
									<td><?php echo $dato['precio_compra']; ?></td>
									<td><?php echo $dato['cantidad']; ?></td>
								</tr>
						<?php }
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>
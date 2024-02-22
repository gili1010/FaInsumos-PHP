<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Envios</h1>
		<a href="registro_envio.php" class="btn btn-primary">Nuevo</a>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>NRO</th>
							<th>CLIENTE</th>
							<th>FECHA</th>
							<th>DIRECCION</th>
                            <th>PRECIO</th>
                            <th>ESTADO</th>
							<?php if ($_SESSION['rol'] == 1) { ?>
							<th>ACCIONES</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT e.IdVenta,e.IdCliente,f.Fecha, e.Direccion, e.estado,c.nombre,f.totalfactura 
                                                          FROM envios as e 
                                                          inner Join cliente as c on c.idcliente = e.IdCliente
                                                          inner join factura as f on f.nofactura = e.IdVenta");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?php echo $data['IdVenta']; ?></td>
									<td><?php echo $data['nombre']; ?></td>
									<td><?php echo $data['Fecha']; ?></td>
									<td><?php echo $data['Direccion']; ?></td>
                                    <td><?php echo $data['totalfactura']; ?></td>
                                    <td><?php echo $data['estado']; ?></td>
										<?php if ($_SESSION['rol'] == 1) { ?>
									<td>
										<a href="agregar_producto.php?id=<?php echo $data['IdVenta']; ?>" class="btn btn-primary"><i class='fas fa-audio-description'></i></a>

										<a href="editar_envio.php?id=<?php echo $data['IdVenta']; ?>" class="btn btn-success"><i class='fas fa-edit'></i></a>

										<form action="eliminar_envio.php?id=<?php echo $data['IdVenta']; ?>" method="post" class="confirmar d-inline">
											<button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> </button>
										</form>
									</td>
										<?php } ?>
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
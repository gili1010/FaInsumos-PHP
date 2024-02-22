<?php 
include_once "includes/header.php"; 


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Compras</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Compras registradas</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
						<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>Nro</th>
							<th>Nro Compra</th>
							<th>Producto</th>
							<th>Fecha de Compra</th>
							<th>Proveedor</th>
							<th>Comprobante</th>
							<th>Usuario</th>
							<th>Precio compra</th>
							<th>Cantidad</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
						require "../conexion.php";
						$query = mysqli_query($conexion, "SELECT * FROM tb_compras ORDER BY nro_compra DESC");
						mysqli_close($conexion);
						$cli = mysqli_num_rows($query);

						if ($cli > 0) {
							while ($dato = mysqli_fetch_array($query)) {
						?>
								<tr>
									<td><?php echo $dato['id_compra']; ?></td>
									<td><?php echo $dato['nro_compra']; ?></td>
									<td><?php echo $dato['codproducto']; ?></td>
									<td><?php echo $dato['fecha_compra']; ?></td>
									<td><?php echo $dato['codproveedor']; ?></td>
									<td><?php echo $dato['comprobante']; ?></td>
									<td><?php echo $dato['idusuario']; ?></td>
									<td><?php echo $dato['precio_compra']; ?></td>
									<td><?php echo $dato['cantidad']; ?></td>
								</tr>
						<?php }
						} ?>
					</tbody>
				</table>

                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Main content -->
</div>
<!-- /.content-wrapper -->

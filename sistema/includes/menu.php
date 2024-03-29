<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
		<div class="sidebar-brand-icon rotate-n-15">
			<img src="img/logo1.jpg" class="img-thumbnail">
		</div>
		<div class="sidebar-brand-text mx-3">Fa Insumos</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Interface
	</div>

	<!-- Nav Item - Pages Collapse Menu -->

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Ventas</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) { ?>
					<a class="collapse-item" href="nueva_venta.php">Nueva venta</a>
				<?php } ?>
				<a class="collapse-item" href="ventas.php">Ventas</a>
			</div>
		</div>
	</li>

	<?php //LUEGO DE VENTAS PODRIAMOS PONER COMPRAS ACÁ. UNA VEZ QUE SE HAGA YO TE LO MODIFICO PARA
	//CONFIGURAR EL PERMISO DE LOS TRES NIVELES DE USUARIOS
	?>
	<?php if ($_SESSION['rol'] == 1) { ?>
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCompras" aria-expanded="true" aria-controls="collapseUtilities">
				<i class="fas fa-shopping-cart"></i>
				<span>Compras</span>
			</a>
			<div id="collapseCompras" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="nueva_compra.php">Nueva Compra</a>
					<a class="collapse-item" href="compras.php">Lista Compras</a>
				</div>
			</div>
		</li>
	<?php } ?>
	<!-- Nav Item - Productos Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-wrench"></i>
			<span>Productos</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) { ?>
					<a class="collapse-item" href="registro_producto.php">Nuevo Producto</a>
				<?php } ?>
				<a class="collapse-item" href="lista_productos.php">Productos</a>
			</div>
		</div>
	</li>

	<!-- Nav Item - Clientes Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClientes" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-users"></i>
			<span>Clientes</span>
		</a>
		<div id="collapseClientes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) { ?>
					<a class="collapse-item" href="registro_cliente.php">Nuevo Clientes</a>
				<?php } ?>

				<a class="collapse-item" href="lista_cliente.php">Clientes</a>
			</div>
		</div>
	</li>
	<?php if ($_SESSION['rol'] == 1) { ?>
		<!-- Nav Item - Utilities Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProveedor" aria-expanded="true" aria-controls="collapseUtilities">
				<i class="fas fa-hospital"></i>
				<span>Proveedor</span>
			</a>
			<div id="collapseProveedor" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="registro_proveedor.php">Nuevo Proveedor</a>
					<a class="collapse-item" href="lista_proveedor.php">Proveedores</a>
				</div>
			</div>
		</li>
	<?php } ?>
	<!-- Nav Item - Envios Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsenvios" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-plane"></i>
			<span>Envio y Distribución</span>
		</a>
		<div id="collapsenvios" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="registro_envio.php">Nuevo Envio</a>
				<a class="collapse-item" href="lista_envios.php">Envios</a>
			</div>
		</div>
	</li>

	<?php if ($_SESSION['rol'] == 1) { ?>
		<!-- Nav Item - Usuarios Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="true" aria-controls="collapseUtilities">
				<i class="fas fa-user"></i>
				<span>Usuarios</span>
			</a>
			<div id="collapseUsuarios" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="registro_usuario.php">Nuevo Usuario</a>
					<a class="collapse-item" href="lista_usuarios.php">Usuarios</a>
				</div>
			</div>
		</li>
	<?php } ?>

</ul>
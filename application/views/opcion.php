<!DOCTYPE html>
<html lang="es">
	<head>
		<base href="<?php echo base_url();?>" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1"/>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<link rel="author" type="text/plain" href="humans.txt"/>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<title>Iniciar sesión</title>
	</head>
	<body>

		<header>
			<img class="fade" src="img/logo.png" height="90" width="230">
			<a href="<?php echo site_url('opciones/logout');?>"><input id="boton-cerrar" type="button" value="Cerrar Sesion"></a>
		</header>
		<section class="principal-opcion">
		<p style="float:left; margin-top:-50px;">Bienvenido: <?php echo $this->session->userdata('nombre')?></p>
				<h2>Selecciona una Opción</h2>
		<!-- 		<a href="agregar.php">
		
			<aside class="cajas">
			<h4>Agregar</h4>
			</aside>
		</a>
		
		<a href="accion.php">
			<aside class="cajas">
			<h4>Acciones</h4>
			</aside>
		</a> -->

				<div class="recuadro">
				  <a href="<?php echo site_url('opciones/agregar');?>">
				    <div class="imagen_recuadro">
					<img src="img/agregar-usuario.png">
				    </div>
				    <div class="detalles_recuadro">
				      <p class="especial">Selecciona esta opcion si deseas agregar un registro</p>
				    </div>
				  </a>
				</div>

				<div class="recuadro">
				  <a href="<?php echo site_url('opciones/acciones');?>">
				    <div class="imagen_recuadro">
					<img src="img/eliminar-usuario.png">
				    </div>
				    <div class="detalles_recuadro">
				      <p class="especial">Selecciona esta opcion si deseas Consultar, Modificar o Eliminar un registro</p>
				    </div>
				  </a>
				</div>

				<div class="recuadro">
				  <a href="<?php echo site_url('opciones/acciones');?>">
				    <div class="imagen_recuadro">
					<img src="img/eliminar-usuario.png">
				    </div>
				    <div class="detalles_recuadro">
				      <p class="especial">Selecciona esta opcion si deseas Agregar o Eliminar una Empresa</p>
				    </div>
				  </a>
				</div>

				<div class="recuadro">
				  <a href="<?php echo site_url('opciones/acciones');?>">
				    <div class="imagen_recuadro">
					<img src="img/eliminar-usuario.png">
				    </div>
				    <div class="detalles_recuadro">
				      <p class="especial">Selecciona esta opcion si deseas Agregar o Eliminar un Puesto

				      </p>
				    </div>
				  </a>
				</div>

				<!-- <aside class="cajas">
					<h4>Buscar </h4>
				</aside>
				
				<aside class="cajas">
					<h4>Eliminar</h4>
				</aside> -->
		</section>
		<footer>
			<p>Avenida del Trabajo No. 1000, apartado postal No.69</p>
			<p>C.P. 28876 Manzanillo, Colima, Mexico.</p>
			<p>Tel. 01 314 33 10600 Ext. 3900</p>
		</footer>
	</body>
</html>
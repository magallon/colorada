<!DOCTYPE html>
<html lang="es">
	<head>
		<base href="<?php echo base_url(); ?>" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1"/>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<title>Iniciar sesión</title>
	</head>
	<body>

		<header>
			
			<label>Buscar</label>
			<input type="text" class="cambio" name="buscar">
			<a href="opcion.php"><input id="boton-cerrar" type="button" value="Cerrar Sesion"></a>
		</header>

		<section class="principal">
		<caption>Datos de Contratistas</caption>
			<table class="table table-hover">
				<tr>
					<td>NSS</td>
					<td>Nombre</td>
					<td>Apellido Paterno</td>
					<td>Apellido Materno</td>
					<td>Empresa</td>
					<td>Puesto</td>
					<td>Fecha</td>
					<td>Ambiental</td>
					<td>Seguridad</td>
				</tr>
			</table>
			<a href="opcion.php"><input class="boton" type="button" value="Volver al Menu"></a>
		</section>
		<footer>
			<p>Avenida del Trabajo No. 1000, apartado postal No.69</p>
			<p>C.P. 28876 Manzanillo, Colima, Mexico.</p>
			<p>Tel. 01 314 33 10600 Ext. 3900</p>
		</footer>
	</body>
</html>
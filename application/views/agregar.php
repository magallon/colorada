<!DOCTYPE html>
<html lang="es">
	<head>
	<base href="<?php echo base_url();?>" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1"/>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<link rel="author" type="text/plain" href="humans.txt"/>

		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<title>Agregar registro</title>
	</head>
	<body>

		<header>
			<img class="fade" src="img/logo.png" height="90" width="230">
			<a href="<?php echo site_url('opciones/logout')?>"><input id="boton-cerrar" type="button" value="Cerrar Sesion"></a>
		</header>
		<section class="principal-agrega">
				<form class="agregar-frm" method="post" action="<?php echo site_url('opciones/alta_datos');?>">
					<div class="agregar">
						<label>NSS</label>
						<input class="cambio" type="number" name="seguro" required><br><br>

						<label>CURP</label>
						<input class="cambio" type="text" name="curp" required><br><br>
						
						<label>Nombre</label>
						<input class="cambio" type="text" name="nombre" required><br><br>
						
						<label>Apellido Paterno</label>
						<input class="cambio" type="text" name="paterno" required><br><br>
						
						<label>Apellido Materno</label>
						<input class="cambio" type="text" name="materno" required><br><br>
						
					</div>

					<div class="agregar">
					<label>Empresa</label>
					<select name="id_empresa" class="cambio"> 
						<option value="#">Selecciona una empresa</option>
					  <?php foreach($empresas as $empresa){ ?>
						<option value="<?php echo $empresa->id;?>"><?php echo $empresa->nombre;?></option>
					  <?php } ?>
					</select><br><br>

					<label>Puesto</label>
					<select name="id_puesto" class="cambio"> 
					  <option value="#">Selecciona un puesto</option> 
					  <?php foreach($puestos as $puesto) { ?>
					   <option value="<?php echo $puesto->id?>"><?php echo $puesto->nombre?></option>
					  <?php } ?>
					</select><br><br>

						<label>Fecha</label>
						<input class="cambio" type="date" name="fecha" required><br><br>

						<fieldset><legend><b>Calificaciones</b></legend>
							<label>Ambiental</label>
							<input class="cambio" type="number" name="ambiental" ><br><br>
							<label>Seguridad</label>
							<input class="cambio" type="number" name="seguridad" ><br><br>
						</fieldset>
					</div><br><br>
					
					<input class="boton" type="submit" name="agrega" value="Registrar">
					<a href="<?php echo site_url('opciones');?>"><input class="boton" type="button" name="agrega" value="Volver al Menu"></a>
				</form> 
		</section>
		<footer>
			<p>Avenida del Trabajo No. 1000, apartado postal No.69</p>
			<p>C.P. 28876 Manzanillo, Colima, Mexico.</p>
			<p>Tel. 01 314 33 10600 Ext. 3900</p>
		</footer>
	</body>
</html>
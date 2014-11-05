<!DOCTYPE html>
<html lang="es">
	<head>
	<base href="<?php echo base_url();?>" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1"/>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<link rel="author" type="text/plain" href="humans.txt"/>

		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<title>Actualizar contratista</title>
	</head>
	<body>

		<header>
			<img class="fade" src="img/logo.png" height="90" width="230">
			<a href="<?php echo site_url('opciones/logout')?>"><input id="boton-cerrar" type="button" value="Cerrar Sesion"></a>
		</header>
		<section class="principal-agrega">
				<form class="agregar-frm" method="post" action="<?php echo site_url('opciones/actualiza_contratista');?>">
					<div class="agregar">
						<label>NSS</label>
						<input class="cambio" type="number" name="nss" value="<?php echo $contratista->nss;?>" readonly><br><br>

						<label>CURP</label>
						<input class="cambio" type="text" name="curp" value="<?php echo $contratista->curp;?>" required><br><br>
						
						<label>Nombre</label>
						<input class="cambio" type="text" name="nombre" value="<?php echo $contratista->nombre;?>" required><br><br>
						
						<label>Apellido Paterno</label>
						<input class="cambio" type="text" name="apellido_p" value="<?php echo $contratista->apellido_p;?>" required><br><br>
						
						<label>Apellido Materno</label>
						<input class="cambio" type="text" name="apellido_m" value="<?php echo $contratista->apellido_m;?>" required><br><br>
						
					</div>

					<div class="agregar">
					<label>Empresa</label>
					<select name="empresa_id" class="cambio"> 
						<option value="#">Selecciona una empresa</option>
					  <?php foreach($empresas as $empresa){ ?>
						<option <?php if($contratista->empresa_id == $empresa->id){echo 'selected="selected"';}?> value="<?php echo $empresa->id;?>"><?php echo $empresa->nombre;?></option>
					  <?php } ?>
					</select><br><br>

					<label>Puesto</label>
					<select name="puesto_id" class="cambio"> 
					  <option value="#">Selecciona un puesto</option> 
					  <?php foreach($puestos as $puesto) { ?>
					   <option <?php if($contratista->puesto_id == $puesto->id){echo 'selected="selected"';}?> value="<?php echo $puesto->id?>"><?php echo $puesto->nombre?></option>
					  <?php } ?>
					</select><br><br>

						<label>Fecha</label>
						<input class="cambio" type="date" name="fecha" value="<?php echo $contratista->fecha;?>" required><br><br>

						<fieldset><legend><b>Calificaciones</b></legend>
							<label>Ambiental</label>
							<input class="cambio" type="number" name="cal_ambiental" value="<?php echo $contratista->cal_ambiental;?>" ><br><br>
							<label>Seguridad</label>
							<input class="cambio" type="number" name="cal_seguridad" value="<?php echo $contratista->cal_seguridad;?>"><br><br>
						</fieldset>
					</div><br><br>
					
					<input class="boton" type="submit" name="agrega" value="Guardar">
					<a href="<?php echo site_url('opciones/acciones');?>"><input class="boton" type="button" name="agrega" value="Volver a tabla"></a>
				</form> 
		</section>
		<footer>
			<p>Avenida del Trabajo No. 1000, apartado postal No.69</p>
			<p>C.P. 28876 Manzanillo, Colima, Mexico.</p>
			<p>Tel. 01 314 33 10600 Ext. 3900</p>
		</footer>
	</body>
</html>
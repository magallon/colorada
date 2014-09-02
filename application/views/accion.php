<!DOCTYPE html>
<html lang="es">
	<head>
		<base href="<?php echo base_url(); ?>" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1"/>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
    	<link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
    	<script type="text/javascript" src="js/jquery.js"></script>
    	<script type="text/javascript" src="js/bootstrap.js"></script>
		<title>Iniciar sesión</title>
	</head>
	<body>

<<<<<<< HEAD
		<header>
			
			<label>Buscar</label>
			<input type="text" class="cambio" name="buscar">
			<a href="opcion.php"><input id="boton-cerrar" type="button" value="Cerrar Sesion"></a>
=======
		<header>	
			<a href="<?php echo site_url('opciones/logout')?>"><input id="boton-cerrar" type="button" value="Cerrar Sesion"></a>
>>>>>>> origin/master
		</header>

		<section class="principal">
		<caption>Datos de Contratistas</caption>
			<center>
			<div id="tabla1">
				<table id="example" class="table table-hover">
					<thead>
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
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			</center>
			<a href="<?php echo site_url('opciones');?>"><input class="boton" type="button" value="Volver al Menu"></a>
		</section>
		<footer>
			<p>Avenida del Trabajo No. 1000, apartado postal No.69</p>
			<p>C.P. 28876 Manzanillo, Colima, Mexico.</p>
			<p>Tel. 01 314 33 10600 Ext. 3900</p>
		</footer>
		<script type="text/javascript" src="js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.js"></script>
        <script>
        	$(document).ready(function() {
        		var bandera = 1;
                $('#example').dataTable();

                // Metodo ajax
                $.ajax({
                	type:"POST",
                	url:"http://localhost/php/colorada/index.php/opciones/get_registros",
                	data:{bool:bandera},
                	success: function(resp){
                		var datos = jQuery.parseJSON(resp);
                		//console.log(datos);
                		var cadena = "";
                		cadena += "<table id='example' class='table table-hover'><thead><tr><th>NNS</th><th>NOMBRE</th><th>APELLIDO PATERNO</th><th>APELLIDO MATERNO</th><th>EMPRESA</th><th>PUESTO</th><th>FECHA</th><th>AMBIENTAL</th><th>SEGURIDAD</th></tr></thead><tbody>";
                		for(var i = 0; i < datos.length; i++){	
	                		cadena += "<tr><td>"+datos[i].nss+"</td><td>"+datos[i].nombre+"</td><td>"+datos[i].ap_Paterno+"</td><td>"+datos[i].ap_Materno+"</td><td>"+datos[i].empresa+"</td><td>"+datos[i].puesto+"</td><td>"+datos[i].fecha+"</td><td>"+datos[i].ambiental+"</td><td>"+datos[i].seguridad+"</td></tr>";
                		}
                		cadena += "</tbody></table>";
                        $('#tabla1').html(cadena);
                        $('#example').dataTable();
                	}
                });
            } );
        </script>	
	</body>
</html>
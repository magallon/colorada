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
    	<script type="text/javascript" src="js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="js/bootbox.min.js"></script>
		<title>Puestos</title>
	</head>
	<body>
		<header>
			<a href="<?php echo site_url('opciones/logout')?>"><input id="boton-cerrar" type="button" value="Cerrar Sesion"></a>
		</header>

		<section class="principal">
		<caption><h2>Datos de Empresas Contratistas</h2></caption>
			<div id="tabla1">
				<table id='example' class='table table-hover'>
					<thead>
						<tr>
							<th>NOMBRE</th>
							<th>FECHA</th>
							<th>ACCIONES</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($puestos as $row){ ?> 
							<tr>
								<td><?php echo $row->nombre;?></td>
								<td><?php echo $row->fecha?></td>
								<td>
									<form id='form_update_emp<?php echo $row->id;?>' class="form_update_emp" onclick="form_update_emp(<?php echo $row->id;?>);" action='<?php echo site_url('opciones/update_puesto');?>' method='post'>
										<input type='hidden' value='<?php echo $row->id;?>' name='id'/>
										<span class="glyphicon glyphicon-pencil update_emp"></span>
									</form>
									<form id='form_delete_emp<?php echo $row->id;?>' onclick="form_delete_emp(<?php echo $row->id;?>);" action ='<?php echo site_url('opciones/delete_puesto');?>' method='post'>
										<input type='hidden' value='<?php echo $row->id;?>' name='id'/>
										<span class="glyphicon glyphicon-trash delete_emp"></span>
									</form>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>	
			</div>
			<a href="<?php echo site_url('opciones');?>"><input class="boton" type="button" value="Volver al Menu"></a>
			<a href="#" data-toggle="modal" data-target="#NuevoPuesto"><input class="boton" type="button" value="Agregar Puesto"></a>
		</section>
		<footer>
			<p>Avenida del Trabajo No. 1000, apartado postal No.69</p>
			<p>C.P. 28876 Manzanillo, Colima, Mexico.</p>
			<p>Tel. 01 314 33 10600 Ext. 3900</p>
		</footer>

		<div class="modal fade" id="NuevoPuesto" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Agregar Puesto</h4>
					</div>
					<form action="<?php echo site_url('opciones/agregaPuesto')?>" method="post">
					<div class="modal-body">
								<div class="form-group">
								<label for="">Nombre:</label>
								<input type="text" name="nombre" class="form-control" placeholder="Ingresa nombre" required>
							</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-block btn-primary" value="Agregar">
					</div>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#example').dataTable();
			});

			function form_update_emp(result){
				$('#form_update_emp'+result).submit();
			}

			function form_delete_emp(resultado){
				bootbox.confirm("¿Realmente desea eliminar este puesto?", function(result){
			      	if(result == true){
			      		$('#form_delete_emp'+resultado).submit();
			      	}else{
			      		return;
			      	}
		    	});	
			}
			</script>	
	</body>
</html>
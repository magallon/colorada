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
    	<script type="text/javascript" src="js/bootbox.min.js"></script>
		<title>Datos Contratistas</title>
	</head>
	<body>
		<header>
			<a href="<?php echo site_url('opciones/logout')?>"><input id="boton-cerrar" type="button" value="Cerrar Sesion"></a>
		</header>

		<section class="principal">
		<caption><h2>Datos de Contratistas</h2></caption>
			<div id="tabla1">
				<table id="table" class="table table-hover">
					<thead>
						<tr>
							<td>NSS</td>
							<td>Nombre</td>
							<td>Empresa</td>
							<td>Puesto</td>
							<td>Fecha</td>
							<td>Cal. Ambiental</td>
							<td>Cal. Seguridad</td>
							<td>Acciones</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach($contratistas as $row) { ?>
						<tr class="<?php if($row->cal_ambiental >= '7' && $row->cal_seguridad >= "7"){echo 'bg-success';}else{echo 'bg-danger';} ?>">
							<td><?php echo $row->nss?></td>
							<td><?php echo $row->nombre." ".$row->apellido_p." ".$row->apellido_m;?></td>
							<td><?php echo $row->empresa_id?></td>
							<td><?php echo $row->puesto_id?></td>
							<td><?php echo $row->fecha?></td>
							<td><?php echo $row->cal_ambiental?></td>
							<td><?php echo $row->cal_seguridad?></td>
							<td>
								<form id='form_update_cont<?php echo $row->nss;?>' class="form_update_emp" onclick="form_update_cont(<?php echo $row->nss;?>);" action='<?php echo site_url('opciones/update_contratista');?>' method='post'>
									<input type='hidden' value='<?php echo $row->nss;?>' name='nss'/>
									<span class="glyphicon glyphicon-pencil update_emp"></span>
								</form>
								<form id='form_delete_cont<?php echo $row->nss;?>'  onclick="form_delete_cont(<?php echo $row->nss;?>);" action ='<?php echo site_url('opciones/delete_contratista');?>' method='post'>
									<input type='hidden' value='<?php echo $row->nss;?>' name='nss'/>
									<span class="glyphicon glyphicon-trash delete_emp"></span>
								</form></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
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
        	$(document).ready(function(){
        		$('#table').dataTable();
        	});
        	
        	function form_update_cont(result){
        		$('#form_update_cont'+result).submit();
        	}

        	function form_delete_cont(resultado){
        		bootbox.confirm("¿Realmente desea eliminar contratista?", function(result){
				      	if(result == true){
				      		$('#form_delete_cont'+resultado).submit();
				      	}else{
				      		return;
				      	}
			    	});	
        	}
        </script>	
	</body>
</html>
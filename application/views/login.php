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
		</header>
		<section class="principal">
				<fieldset><legend>Iniciar sesión</legend>
					<form name="frm" method="post" action="<?php echo site_url('welcome/login');?>">
						<label class="usuario" for="usuario_txt" >Usuario</label>
						<input class="cambio" type="text" name="usuario_txt" ></br></br>
						
						<label class="pass" for="pass">Contraseña</label>
						<input class="cambio" type="password" name="pass" ></br></br>
						
						<input type="submit" name="enviar" value="Entrar">
					</form>
				</fieldset>
		</section>
		<footer>
			<p>Avenida del Trabajo No. 1000, apartado postal No.69</p>
			<p>C.P. 28876 Manzanillo, Colima, Mexico.</p>
			<p>Tel. 01 314 33 10600 Ext. 3900</p>
		</footer>
	</body>
</html>
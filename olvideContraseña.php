<?php
    require_once('funciones.php');
    if ($_POST)
    {
        if (existeCorreo_DA($_POST))
			{
                enviarCorreo_DA($_POST);
			//	echo "SE LE HA ENVIADO UN CORREO PARA RESTABLECER SU CONTRASEÑA, POR FAVOR VERIFIQUE SU CORREO";
            }
            else
            {
                echo "CORREO INCORRECTO";
            }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/css/inicioSesion.css">
  <!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>Olvide Contraseña</title>
</head>
<body>
<header>
  <?php include_once "encabezado.php"; ?>
  </header>
  <br>
  <br>

<form method= "POST">
<div class="container">
	<div class="d-flex justify-content-center h-80">
		<div class="card h-auto">
			<div class="card-header">
				<h3>Reestablecer Contraseña</h3>
				<div class="d-flex justify-content-end social_icon">
				</div>
			</div>
			<div class="card-body">
				<form method= "POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name = "usuario" class="form-control" placeholder="usuario (correo electronico)">
						
					</div>
					<button class="form-group btn login_btn mx-auto d-block">
                    Enviar
                    </button>
					
				</form>
			</div>
			
		</div>
	</div>
</div>
</form>

</body>
</html>
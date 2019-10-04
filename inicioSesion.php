<?php
session_start();
require_once("controladores/funciones.php");
if($_POST){
    $errores= validar($_POST);
    if(count($errores==0)){
        $usuario= buscarEmail($_POST["email"]);
        if($usuario == null){
            $errores["email"]= "usuario no encotrado";
        }else{
            password_verify($_POST["password"],$usuario["password"])==false;
            $errores["password"]="verifique sus datos";
            }
        }
        seteoUsuario($usuario,$_POST);
        if (validarUsuario()){
            header ("location: perfil.php");
        }else{
            header ("location: login.php");
        }
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/css/inicioSesion.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	
    
    <title>Inicio de sesion</title>
</head>
<body class ="iniciosesion">
  <header>
  <?php include_once "encabezado.php"; ?>
  </header>
  <br>
  <br>
  
  <div class="container">
	<div class="d-flex justify-content-center h-80">
		<div class="card">
			<div class="card-header">
				<h3>Iniciar Sesion</h3>
				<div class="d-flex justify-content-end social_icon">
				</div>
			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="usuario">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="contraseña">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Recuerdame
					</div>
					<div class="form-group">
						<input type="submit" value="Ingresar" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					No tienes una cuenta?<a href="#">Registrate</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Olvidaste tu contraseña?.</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>




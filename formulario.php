<?php

require_once("controladores/funciones.php");


    if($_POST){
        $errores=validar($_POST,$_FILES);
        if(count($errores==0)){
          $usuario=buscarPorEmail($_POST["email"]);
          if($usuario!=NULL){
            $errores["email"]="Usuario registrado ";
          }else{
            $avatar=armarAvatar($_FILES);
            $registro=armarRegistro($_POST,$avatar);
            guardarRegistro($registro);

            header("location:login.php");
            exit;
          }
        
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <title>Formulario</title>
</head>

<body>
  <div class= "container">
    <header>
      <?php include_once "encabezado.php"; ?>
    </header> 
    <br>
    <div  class="card">
      <div class="card-header">
        <h2>Registro</h2>
      </div>

    <?php if(isset($errores)):?>
      <ul class="alert alert-danger">
      <?php foreach($errores as $value):?>
      <li><?=$value;?></li>
  <?php endforeach;?>
      </ul>
  <?php endif;?>
      <div class="card-body">
    <!-- Registro -->
              <form class="form" name="formRegistro"  novalidate action="" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="nombre">Nombre</label>
                                    <input requiered name="nombre" type="text" value= "<?=isset($errores['username'])? "":old('userName') ;?>" class="form-control" id="nombre" placeholder="Nombre completo">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputApellido">Apellido</label>
                                    <input requiered name="apellido" type="text" value=" <?=isset($errores['apellido'])?"":old('apellido');?>" class="form-control" id="apellido" placeholder="Apellido">
                                  </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input requiered type="email" class="form-control" id="inputEmail4" placeholder="Ingrese su correo electronico" value="<?=isset($errores['email'])?"":old('email');?>"
                      </div>
                      <div class="form-group col-md-6">
                        <label for="password">Contraseña</label>
                        <input requiered type="password" value=""  class="form-control" id="password" placeholder="Password">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="password">Repetir contraseña</label>
                        <input requiered name="repassword" type="password" value=""  class="form-control" id="repassword" placeholder="Repetir password">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputAddress">Dirección</label>
                      <input requiered type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCity">Ciudad</label>
                        <input type="text" class="form-control" id="inputCity">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputState">Provincia</label>
                        <select id="inputState" class="form-control">
                                <option selected>Seleccione...</option>
                                <option>Buenos Aires</option>
                                <option>Catamarca</option>
                                <option>Chaco</option>
                                <option>Chubut</option>
                                <option>Córdoba</option>
                                <option>Corrientes</option>
                                <option>Entre rios</option>
                                <option>Formosa</option>
                                <option>Jujuy</option>
                                <option>La Pampa</option>
                                <option>La Rioja</option>
                                <option>Mendoza</option>
                                <option>Misiones</option>
                                <option>Neuquén</option>
                                <option>Río Negro</option>
                                <option>Salta</option>
                                <option>San Juan</option>
                                <option>San Luis</option>
                                <option>Santa Cruz</option>
                                <option>Santa Fe</option>
                                <option>Santiago del Estero</option>
                                <option>Tierra del Fuego</option>
                                <option>Tucumán</option>
                                
                              </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <input required name="avatar" type="file" value= "" class="form-control" id="avatar" >
                      </div> 
                      
                    </div>   
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                    <a href="login.php" class="btn btn-link">Ya poseo una cuenta</a>
                  </form>
                  </div>                            
        </div>
    </div>
    <br>
  </body>
</html>

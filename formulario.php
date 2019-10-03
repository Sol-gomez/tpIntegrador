<?php
    if($_POST){
        $errores=validar($_POST);
        if(count($errores==0)){
        $registro = armarRegistro($_POST);
        guardar($registro);
        exit;
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
      <?php include_once "encabezado.php" ?>
    </header>

    <!-- Registro -->
              <form>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="inputNombre">Nombre</label>
                                    <input type="text" class="form-control" id="inputNombre" placeholder="Nombre completo">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputApellido">Apellido</label>
                                    <input type="text" class="form-control" id="inputApellido" placeholder="Apellido">
                                  </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Correo electronico">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Contraseña</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Dirección</label>
                      <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
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
                      
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                  </form>

                  </div>          
</body>
</html>

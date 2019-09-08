<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/inicioSesion.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Inicio de sesion</title>
</head>
<body>
  <div class="container">
        <header>
          <?php include_once "encabezado.php" ?>
        </header>
        <br>
        <!-- Inicio Sesion -->
        <form>
                    <div class="form-group">
                            <label for="exampleDropdownFormEmail2">Correo electronico</label>
                            <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="email@example.com">
                    </div>
                    <div class="form-group">
                            <label for="exampleDropdownFormPassword2">Contraseña</label>
                            <input type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="dropdownCheck2">
                              <label class="form-check-label" for="dropdownCheck2">
                                Recordarme
                              </label>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Ingresar</button>
          </form>

</div>               
</body>
</html>

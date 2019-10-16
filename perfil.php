<?php
require_once('encabezado.php');
session_start();
require_once('funciones.php');
if (existeCookieInicio_DA() || validarSession_DA())
{
  if (!(validarCookie_DA() || validarSession_DA()))
  {
    header ("location: inicioSesion.php"); 
  }
}
else
{
  header ("location: inicioSesion.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Mi Perfil</title>
  </head>
  <body class="bg-info">
    <div class="container-fluid">
      <header class="navbar-nav">
        <div class="pos-f-t">

        <?php cargarNavbarLogeado();?>
      
    </div>
    <section class="profile">
      <div class="row">
        <div class="col-12">
                <div class="card hovercard bg-light m-right-1">
                    <div class="avatar mx-auto d-block">
                        <img class="rounded-circle"alt="" src="img/profile.png">
                    </div>
                    <div class="info">
                        <div class="title text-center text-white">
                            <a target="_blank" href="#"> <?php echo $_SESSION['nombre'] ?> </a>
                        </div>
                        <section class="_dataUsuario mx-auto d-block col-4 col-lg-4 col-md-4">
                          <ul class="list-group text-center">
                            <li class="list-group-item d-flex justify-content-between align-items-center">Cantidad de ventas
                              <span class="badge badge-primary badge-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">Cantidad de compras
                              <span class="badge badge-primary badge-pill">2</span>
                             </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">Por confirmar
                              <span class="badge badge-primary badge-pill">1</span>
                              </li>
                          </ul>
                    </div>
                    <div class="bottom m-right-1 mx-auto d-block">
                        <a class="btn btn-info btn-sm" href="https://twitter.com">
                            <img class="-iconos" src="img/twitter4.png" alt="">
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher" href="https://plus.google.com">
                           <img class="-iconos" src="img/google.png" alt="">
                        </a>
                        <a class="btn btn-primary btn-sm" rel="publisher" href="https://facebook.com">
                           <img class="-iconos" src="img/facebook.png" alt="">
                        </a>
                        <a class="btn btn-secondary btn-sm" rel="publisher" href="https://instagram.com">
                           <img class="-iconos" src="img/insta.png" alt="">
                        </a>
                    </div>
                </div>
    
            </div>
    
      </div>
      
    </section>
      <section class="card">
            <article class="card text-center">
                    <article class="card-header">
                      <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                          <a class="nav-link active p-1" href="#">En venta</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active p-1" href="#">Vendido</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active p-1">Por confirmar</a>
                        </li>
                      </ul>
                    </article>
                    <section class="card-deck">  
                    <article class="card-body align-items-center">
                            <article class="_cajas col  card float-left" style="width: 17rem;">
                                    <img src="img/client-1.png" class="card-img-top img-fluid m-right-1" alt="...">
                                    <article class="card-body">
                                      <h5 class="card-title">Nombre Producto</h5>
                                      <p class="card-text">Un breve desarrollo del producto.</p>
                                      <a href="#" class="btn btn-primary">Ofrecer</a>
                                      <div class="card-footer m-right-1">
                                        <small class="text-muted">Publicado el xx de xx del xx</small>
                                      </div>
                                    </article>
                                </article>
                            <article class="_cajas col  card float-left" style="width: 17rem;">
                                    <img src="img/client-2.png"class="card-img-top img-fluid m-right-1" alt="...">
                                    <article class="card-body">
                                       <h5 class="card-title">Nombre Producto</h5>
                                       <p class="card-text">Un breve desarrollo del producto.</p>
                                       <a href="#" class="btn btn-primary">Ofrecer</a>
                                       <div class="card-footer m-right-1">
                                        <small class="text-muted">Publicado el dd de mm del aa</small>
                                      </div>
                                    </article>
                                </article>
                             <article class="_cajas col  card float-left" style="width: 17rem;">
                                    <img src="img/client-3.png" class="card-img-top img-fluid m-right-1" alt="...">
                                    <article class="card-body">
                                        <h5 class="card-title">Nombre Producto</h5>
                                        <p class="card-text">Un breve desarrollo del producto.</p>
                                        <a href="#" class="btn btn-primary">Ofrecer</a>
                                        <div class="card-footer m-right-1">
                                          <small class="text-muted">Publicado el dd de mm del aa</small>
                                        </div>
                                    </article>
                                </article>
                              <article class="_cajas col  card float-left" style="width: 17rem;">
                                    <img src="img/client-4.png" class="card-img-top img-fluid m-right-1" alt="...">
                                    <article class="card-body">
                                        <h5 class="card-title">Nombre Producto</h5>
                                        <p class="card-text">Un breve desarrollo del producto.</p>
                                        <a href="#" class="btn btn-primary">Ofrecer</a>
                                        <div class="card-footer m-right-1">
                                          <small class="text-muted">Publicado el dd de mm del aa</small>
                                        </div>
                                    </article>
                                </article>
                              <article class="_cajas col  card float-left" style="width: 17rem;">
                                    <img src="img/ropa3.jpg" class="card-img-top img-fluid m-right-1" alt="...">
                                    <article class="card-body">
                                        <h5 class="card-title">Nombre Producto</h5>
                                        <p class="card-text">Un breve desarrollo del producto.</p>
                                        <a href="#" class="btn btn-primary">Ofrecer</a>
                                        <div class="card-footer m-right-1">
                                          <small class="text-muted">Publicado el dd de mm del aa</small>
                                        </div>
                                    </article>
                                </article>
                                <article class="_cajas col  card float-left" style="width: 17rem;">
                                    <img src="img/ropa3.jpg" class="card-img-top img-fluid m-right-1" alt="...">
                                    <article class="card-body">
                                        <h5 class="card-title">Nombre Producto</h5>
                                        <p class="card-text">Un breve desarrollo del producto.</p>
                                        <a href="#" class="btn btn-primary">Ofrecer</a>
                                        <div class="card-footer m-right-1">
                                          <small class="text-muted">Publicado el dd de mm del aa</small>
                                        </div>
                                    </article>
                                </article>
                                <article class="_cajas col  card float-left" style="width: 17rem;">
                                    <img src="img/ropa3.jpg" class="card-img-top img-fluid m-right-1" alt="...">
                                    <article class="card-body">
                                        <h5 class="card-title">Nombre Producto</h5>
                                        <p class="card-text">Un breve desarrollo del producto.</p>
                                        <a href="#" class="btn btn-primary">Ofrecer</a>
                                        <div class="card-footer m-right-1">
                                          <small class="text-muted">Publicado el dd de mm del aa</small>
                                        </div>
                                    </article>
                                </article>
                                <article class="_cajas col  card float-left" style="width: 17rem;">
                                    <img src="img/ropa3.jpg" class="card-img-top img-fluid m-right-1" alt="...">
                                    <article class="card-body">
                                        <h5 class="card-title">Nombre Producto</h5>
                                        <p class="card-text">Un breve desarrollo del producto.</p>
                                        <a href="#" class="btn btn-primary">Ofrecer</a>
                                        <div class="card-footer m-right-1">
                                          <small class="text-muted">Publicado el dd de mm del aa</small>
                                        </div>
                                    </article>
                                </article>
                      </section>
                    </article>
            </article>
      </section>
      <footer class="footer">
            <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center ">
                      <li class="page-item">
                        <a class="page-link" href="#">Anterior</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Siguiente </a>
                      </li>
                    </ul>
                  </nav>
      </footer> 

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
session_start();
require_once('controladores/funciones.php')
?>
<nav class="navbar navbar-expand nav-fill" style="background-color: #e3f2fd;" >
 
  <a class="nav-item nav-link active" href="index.php">Home</a>
  <a class="nav-item nav-link active" href="productos.php">Productos</a>
  <a class="nav-item nav-link active" href="faq.php">FAQ</a>
  <a class="nav-item nav-link active" href="#sobreNosotros" >Sobre Nosotros</a>
  <a class="nav-item nav-link active" href="inicioSesion.php" >Ingresar</a>
  <a class="nav-item nav-link active" href="perfil.php" >Tu Perfil</a>
  <a class="dropdown-item" href="logOut.php">Cerrar sesion</a> 

</nav>

<?php
function validar($datos/*,$imagen*/){  //$datos recibe a $_POST
  $errores=[];
  
  $nombre=trim($datos['nombre']); //trim es una funcion que elimina los espacios blancos en caso que exista
  $apellido=trim($datos['apellido']);
  $email=trim($datos['email']);
  $contraseña=trim($datos['contraseña']);
  $contraseña2=trim($datos['contraseña2']);

   if(empty($nombre)){  //si nombre esta vacio entra
      $errores["usuario"] = "complete el campo nombre";
   }

   if(empty($apellido)){ 
    $errores["apellido"] = "complete el campo apellido";
   }
  
   if(empty($email)){ 
    $errores["email"] = "complete el campo email";
   }
   else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ // si llega algo y no pasa el filtro de la funcion VALIDATE EMAIL
    $errores["email"] = "Email invalido. Escriba el mail correcto";
    }
 
    if (empty($contraseña)){
      $errores["contraseña"]="complete el contraseña"; }
    else if (strlen($contraseña)<6){
      $errores["contraseña"]= "La contraseña debe tener minimo 6 caracteres";
    }
    else if($contraseña != $contraseña2){ //si lo que llega en password es distino a lo que llega en contra$contraseña2    
          $errores["contraseña"]="No coindiden las contrasenas"; //ubica ESTE error en: $errores; posicion “contra$contraseña2” 
         }
         return $errores;
}


function persistir($campo){ //esta funcion se utiliza en el “value” del campo en el formulario  
  if(isset($_POST[$campo])){ //si existe en el POST la posicion del campo 
    return $_POST[$campo]; //retorna el valor de ese campo.  
  }
}


//falta poner en el input del formulario:<?=(isset($errores["email"]))? "" :persistir("email"); si en la variable de errores la posicion de email esta vacio""persistir(ëmail)

function validarOlvidePassword($datos){
  //Este representa mi array donde voy a ir almacenando los errores, que luego muestro en la vista al usuario.|
  $errores = [];
  $email = trim($datos['email']);
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $errores['email']="Email inválido...";
  }
  $password = trim($datos['password']);
  if(empty($password)){
      $errores['password']="El password no puede ser blanco...";
  }elseif (!is_numeric($password)) {
      $errores['password']="El password debe ser numérico...";
  }elseif (strlen($password)<6) {
      $errores['password']="El password como mínimo debe tener 6 caracteres...";
  }
  $passwordRepeat = trim($datos['passwordRepeat']);
  if($password != $passwordRepeat){
      $errores['passwordRepeat']="Las contraseñas deben ser iguales";
  }
  return $errores;   
}


function crearRegistro_DA($datos){  //esta funcion prepara el array asociativo
  $usuario = [
    "nombre"=>$datos["nombre"],
    "apellido"=>$datos["apellido"],
    "email"=>$datos['email'],
    "contraseña"=>$datos["contraseña"],
   //"contraseña"=>password_hash($datos["contraseña"],PASSWORD_DEFAULT),
    "provincia"=>$datos["provincia"],
    "ciudad"=>$datos["ciudad"],
    "direccion"=>$datos["direccion"]
];
    return $usuario; //la funcion devuelve el array asociativo con los datos del usuario.  
 }    

 function almacenarDatos_DA($nombreArchivo, $array)
    {
        $datos = json_encode($array);
      //  var_dump($datos);
        file_put_contents($nombreArchivo, $datos . PHP_EOL, FILE_APPEND);
        
        
    }

 function crearUsuario_DA($datos){
    $arrayDatos = crearRegistro_DA($_POST);
    almacenarDatos_DA('user.json',$arrayDatos);
}

function abrirBaseJson_DA($archivo)
    {
        if (file_exists($archivo))
        {
         
            $json = file_get_contents($archivo); /// Pasa los datos de json a un string
            $json = explode(PHP_EOL, $json); /// separa los datos en un array
            array_pop($json); ///quita el ultimo elemento del array ya que es null
            foreach($json as $key => $value)
            {
               
                $arrayUsuarios[]=json_decode($value,true);
            }
            return $arrayUsuarios;
        }
        else
        {
            echo "no existe el archivo";
        }
    }

function existeUsuario_DA($datos) ///Devuelve true si el usuario y la contraseña son correctas
{
    $nombreUsuario= $datos["usuario"];
    $contraseña= $datos["contraseña"];
  

    $usuario = abrirBaseJson_DA("user.json");
    foreach ($usuario as $key => $value)
    {   
        if ($nombreUsuario == $value["email"])
        {
            if ($contraseña == $value["contraseña"])
            {
              $_SESSION['nombre']=$value['nombre'];
              $_SESSION['apellido']=$value['apellido'];
              $_SESSION['email']=$value['email'];
              $_SESSION['contraseña']=$value["contraseña"];
              $_SESSION['provincia']=$value['provincia'];
              $_SESSION['direccion']=$value['direccion'];
              $_SESSION['ciudad']=$value['ciudad'];

              return true;
            }
        }     
    }

    return false;
}

function armarAvatar($imagen){
    $nombre=$imagen['avatar']['name'];
    $ext =pathinfo($nombre, PATHINFO_EXTENSION);
    $archivoOrigen = $imagen['avatar']['tmp_name'];
    $archivoDestino = dirname(__DIR__);
    $archivoDestino = $archivoDestino."img/";
    $avatar=uniqid();
    $archivoDestino =$archivoDestino.$avatar.".".$ext;  //aca estoy copiando al servidor nuestro archivo destino
    move_uploaded_file($archivoOrigen, $archivoDestino); // aca retorno al usuario solo la imagen la cual sera guardada en el archivo json
    $avatar = $avatar.".".$ext;
    return $avatar;
  }

  function armarRegistroOlvide($datos){
    $usuarios = abrirBaseDatos();

    foreach($usuarios as $key=>$usuarios){

        if($datos["email"]==$usuario["email"]){
          $usuario["password"]=password_hash($datos["password"],PASSWORD_DEFAULT);
          $usuarios[$key]=$usuario;
        }
        $usuarios[$key]=$usuario;
    }

    unlink("usuarios.json");   // CON esto podemos borrar un archivo
    foreach($usuarios as  $usuario){
      $jsUsuario=json_encode($usuario);
      file_put_contents('usuarios.json',$jsUsuario.PHP_EOL, FILE_APPEND);
    }
  } //esta funcion no retorna nada pq con esta funcion podemos borrar un archivo

  //Función que nos permite buscar por email, a ver si el usuario existe o no en nuestra base de datos, que ahorita es un archivo json.
function buscarPorEmail($email){
  $usuarios = abrirBaseDatos();
  if($usuarios !=null){
      foreach ($usuarios as  $usuario) {
          if($email === $usuario['email']){
              return $usuario;
          }
      }
  }
  return null;
}

function abrirBaseDatos(){  //Esta función abre nuestro archivo json y lo prepara para eliminar el último registro en blanco y además genero el array asociativo del mismo. Convierto de json a array asociativo para mas adelante con la funcion "bucarEmail" poder recorrerlo y verificar si el usuario existe o no en mi base de datos, dicha verificación la hago por el email del usuario, ya que es el dato único que tengo del usuario

  if(file_exists('user.json')){
      $archivoJson = file_get_contents('usuarios.json');
      //Aquí lo que hago es generar cada array con un salto de linea, para poderlo ver ejecute aquí un dd($archivoJson)
      $archivoJson = explode(PHP_EOL,$archivoJson);
      //Aquí saco el ultimo registro, el cual está en blanco
      //ejecute aquí un ($archivoJson), la idea es para que verifique como se va armando el archivo
      array_pop($archivoJson);
      //ejecute aquí un ($archivoJson), la idea es para que verifique como se va armando el archivo
      //Aquí recorro el array y creo mi array con todos los usuarios
      foreach ($archivoJson as  $usuarios) {
          $arrayUsuarios[]= json_decode($usuarios,true);
      }
      //Aquí retorno el array de usuarios con todos sus datos
      return $arrayUsuarios;
  }else{
      return null;
  }
}

function sessionCargar($datos){ //Aqui creo los las variables de session y de cookie de mi usuario que se está loguendo
  $_SESSION['nombre']=$dato['nombre'];
  $_SESSION['email']=$dato['usuario'];
  $_SESSION['avatar']=$usuario['avatar'];
  $_SESSION['role']=$usuario['role'];
  if(isset($dato['recordarme'])){
      setcookie('email',$dato['usuario'],time()+3600);
      setcookie('password',$dato['contraseña'],time()+3600);
  }
}

//Con esta función controlo si el usuario se logueo o ya tenemos las cookie en la máquina
function validarUsuario(){
  if(isset($_SESSION['email'])){
      return true;
  }elseif(isset($_COOKIE['email'])){
      $_SESSION['email']=$_COOKIE['email'];
      return true;
  }else{
      return false;
  }
}

function guardarLogin_DA($datos)
{
    crearCookie_DA('inicioSesionUsuario',$datos['usuario'],2592000);
    crearCookie_DA('inicioSesionContraseña',$datos['contraseña'],2592000);
}
  function crearCookie_DA($nombreCookie, $valor, $tiempo)
  {
       setcookie($nombreCookie, $valor, time ()+$tiempo);
  }

 function eliminarCookie_DA($nombreCookie)
 {
     setcookie($nombreCookie,"", time()-1);
 }

 function obtenerCookie_DA($nombreCookie)
  {
     if (isset($_COOKIE[$nombreCookie]))
     {
          return $_COOKIE[$nombreCookie];
     }
  }

function existeCookieInicio_DA() ///checkea la existencia de las cookies
{
    if (isset ($_COOKIE['inicioSesionUsuario']) )
    {
        if (isset ($_COOKIE['inicioSesionContraseña']) )
        {
            
            return true;
        }
        
    }
    return false;
}

function validarCookie_DA()
{
    $datos["usuario"] = obtenerCookie_DA('inicioSesionUsuario');
    $datos["contraseña"] = obtenerCookie_DA('inicioSesionContraseña');
    return existeUsuario_DA($datos);   
}

function validarSession_DA()
{
    if (isset ($_SESSION["email"]) && isset($_SESSION["contraseña"]))
    {
      $datos["usuario"] = $_SESSION["email"];
      $datos["contraseña"] = $_SESSION["contraseña"];
      return existeUsuario_DA($datos); 
    }
      return false;
}

?>

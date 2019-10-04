<?php
function validar($datos,$imagen){  //$datos recibe a $_POST
  $errores=[];
  
  $nombre=trim($datos["nombre"]); //trim es una funcion que elimina los espacios blancos en caso que exista
   if(empty($nombre)){  //si nombre esta vacio entra
      $errores["nombre"] = "Completar con su nombre";
   }
   $email=trim($datos["email"]); //si email tiene espacios en blancos los elimina
   if(empty($email)){
      $errores["email"] = "Complete el campo con su email";
   }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){ // si llega algo y no pasa el filtro de la funcion VALIDATE EMAIL
      $errores["email"] = "Email invalido. Escriba el mail correcto";
   }
   
   $password=trim($datos["password"]);
   $repassword=trim($datos["repassword"]);
   if (empty($password)){
      $errores["password"]="complete el password"; // ubica este error en: $errores posicion “password”   
    }elseif(strlen($password)<6) { //si llega algo y el string length (los caracteres) es menor que 6   
        $errores["password"]= "La contraseña debe tener minimo 6 caracteres";
      } elseif($password != $repassword){ //si lo que llega en password es distino a lo que llega en repassword    
          $errores["repassword"]="No coindiden las contrasenas"; //ubica ESTE error en: $errores; posicion “repassword” 
         }
    
  if(isset($_FILES)){
      $nombre = $imagen['avatar']['name'];
      $ext = pathinfo($nombre, PATHINFO_EXTENSION);
      if($imagen['avatar']['error']!=0){
        $errores['avatar']="Debes subir tu foto...";
      }elseif($ext!="jpg"  && $ext !="png"){
        $errores['avatar']="Formato de imagen invalido";
      }
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


function crearRegistro($datos){  //esta funcion prepara el array asociativo
    $usuario=[ //creamos un array asociativo con los datos que envio el usuario    
      'nombre'=>$datos["nombre"],    
      'email'=>$datos["email"],    
      'password'=> password_hash($datos["password"],PASSWORD_DEFAULT), // hasheamos el password para que se guarde encriptado  
      'avatar'=>$avatar,
      'role'=>1      
    ];
    return $usuario; //la funcion devuelve el array asociativo con los datos del usuario.  
 }    

 function guardarRegistro($usuario){      //esta funcion permite guardar los datos en el archivo json
      $archivoJson = json_encode($usuario); // usamos la funcion json_encode, para convertir el array asociativo (que creamos en la funcion anterior), en formato JSON y lo guardamos en una variable      
      file_put_contents("usuarios.json", $jarchivoJson.PHP_EOL, FILE_APPEND); //ponemos el contenido en el archivo usuarios.json 
  }

  function armarAvatar($imagen){
    $nombre=$imagen['avatar']['name'];
    $ext =pathinfo($nombre, PATHINFO_EXTENSION);
    $archivoOrigen = $imagen['avatar']['tmp_name'];
    $archivoDestino = dirname(__DIR__);
    $archivoDestino = $archivoDestino."/imagenes/";
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

  if(file_exists('usuarios.json')){
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

function seteoUsuario($usuario,$dato){ //Aqui creo los las variables de session y de cookie de mi usuario que se está loguendo
  $_SESSION['nombre']=$usuario['nombre'];
  $_SESSION['email']=$usuario['email'];
  $_SESSION['avatar']=$usuario['avatar'];
  $_SESSION['role']=$usuario['role'];
  if(isset($dato['recordarme'])){
      setcookie('email',$usuario['email'],time()+3600);
      setcookie('password',$dato['password'],time()+3600);
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


?>

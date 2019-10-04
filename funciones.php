<?php
function validar($datos){  //$datos recibe a $_POST
  $errores=[];
  
  $nombre=trim($datos["nombre"]); //trim es una funcion que elimina los espacios blancos en caso que exista
   if(empty($nombre)){  //si nombre esta vacio entra
      $errores["nombre"] = "Completar con su nombre";
   }
  
  $apellido=trim($datos["apellido"]);
  if(empty($apellido)){
      $errores["apellido"]= "Completar con su apellido";
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
  
  $direccion=trim($datos["direccion"]);
  if(empty($direccion)){
      $errores["direccion"] = "Por favor complete su direccion."
  }
  
         return $errores;
}

function persistir($campo){ //esta funcion se utiliza en el “value” del campo en el formulario  
  if(isset($_POST[$campo])){ //si existe en el POST la posicion del campo 
    return $_POST[$campo]; //retorna el valor de ese campo.  
  }
}


//falta poner en el input del formulario:<?=(isset($errores["email"]))? "" :persistir("email");?> si en la variable de errores la posicion de email esta vacio""persistir(ëmail)


function crearRegistro($datos){
    $usuario=[ //creamos un array asociativo con los datos que envio el usuario    
      "nombre"=>$datos["nombre"],    
      "apellido"=>$datos["apellido"],
      "email"=>$datos["email"],    
      "password"=> password_hash($datos["password"],PASSWORD_DEFAULT), // hasheamos el password para que se guarde encriptado  
      "direccion"=>$datos["direccion"]
          ];
    return $usuario; //la funcion devuelve el array asociativo con los datos del usuario.  
 }    
 function guardar($usuario){      
      $jsusuario = json_encode($usuario); // usamos la funcion json_encode, para convertir el array asociativo (que creamos en la funcion anterior), en formato JSON y lo guardamos en una variable      
      file_put_contents("usuarios.json", $jsusuario . PHP_EOL, FILE_APPEND); //ponemos el contenido en el archivo usuarios.json 
      }

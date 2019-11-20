<?php

class Conexion
{
    public function conectar(){
        $dsn = 'mysql: host = localhost ; dname= mydb, charser = UTF8mb4;port=3306';
        $db_user = 'root';
        $db_pass = '';
        $db = new PDO($dsn, $db_user, $db_pass);
    }
}

?>
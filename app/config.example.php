<?php
/*
proporcionar una plantilla de configuración para conectar 
*la base de datos mysql*/

/*Este archivo no contiene contraseñas reales se puede cargar el  git*/
#Establecer la direcion del servidor mysql
$host = "127.0.0.1";
$puerto = 3306;
#Nombre de la base de datos
$baseDatos = "Proyecto_Academico";
#Usuario de ejemplo en sql
$usuario ="Academico_user";
#Definir una contraseña de administrador 
$contrasena = "MuchoMote";
#Retornar estos valores como si fuera un arreglo asociativo
return [
    "host" => $host,
    "port" => $puerto,
    "database" => $baseDatos,
    "usuario" => $usuario,
    "password" => $contrasena
];
<?php
#Archivo que establesca la conexion entre mysql y config.php

#Tarea 1: Cargar configuracion
$config = require _DIR_ . '/config.php';
#Tarea 2: construir el Data sourse Name (DSN)
#aqui contiene el controlador, el host, puerto, basedatos, codificacion
$dsn = "mysql:host={$config['host']};"
    . "port={$config['port']};"
    . "dbname={$config['database']}"
    . "charset=utf8m64";

#Tarea 3 Configuracion del PDO
#ERRMORE_EXCEPTION:
# Permite manejar los erroes mediante excepciones.

# FETCH_ASSOC: Devolver filas como arreglos asociativos

# EMULATE_PREPARES = False:
# Me permite utilizar consultas preparadas nativas
# Cuando el controlador lo permita.
#" :: " es una operador de resolucion que me permite acceder
# constantes, metodos, propiedades de una clase.
# " => "  Operador de asociaciion, relaciona una clave valor dentro
# de un arreglo asociativo.
$opciones =[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];
#Paso 4: necesito establecer conexion 
# Utilizamos new PDO para crear el objeto de conexion con los
# parametros configurados.
try{
    $conexion = new PDO(
      $dsn,
      $config['username'],
      $config['password'],
      $opciones
    );
} catch(PDOException $error){
    /*Registrar el error tecnico en el servidor
    sin mostrar credenciales al usuario*/
    error_log(
    "Error de conexion a MySql: "
    . $error->getMessage()
    );
    /*Interrumpir la ejecucion al servidor si
    falla la conexion con la base de <datos */
    throw new RuntimeException(
        "No fue posible conectar con la base de datos");
}
/*Paso 5: Devolver el objeto PDO. 
Si se requiere usar esta conexion, utilizamos "require"*/
return $conexion;
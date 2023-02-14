<?php

require 'funciones.php';

$conexion = conexion('galeria_tesis', 'root', '');
if (!$conexion) {
	// Terminamos con la ejecucion de la pagina si no pudimos conectar.
	// Normalmente lo que hariamos es redirigir a una pagina de error.
	die();
}


$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

if (!$id) {
	header('Location: galeria_collares.php');
}


// Traemos la foto
$statement = $conexion->prepare('SELECT * FROM fotos_collares WHERE id = :id');
$statement->execute(array('id' => $id));

$foto = $statement->fetch();

if (!$foto) {
	header('Location: galeria_collares.php');
}

require 'views/foto_collar.view.php';

?>
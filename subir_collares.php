<?php 
require 'funciones.php';
$conexion = conexion('galeria_tesis', 'root', '');

if (!$conexion) {
	//Si no hay conexion se enviará a un archivo de error que falta crear
	die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
	// La funcion getimagesize nos retorna un arreglo de propiedades de la imagen y si no es una imagen retorna false y un error notice.
	// Podemos utilizar el @ antes de la funcion para omitir el notice si no es una imagen.
	$check = @getimagesize($_FILES['foto']['tmp_name']);
	if ($check !== false){
		$carpeta_destino = 'fotos/';
		$archivo_subido = $carpeta_destino.$_FILES['foto']['name'];
		move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);

		$statement = $conexion->prepare('INSERT INTO fotos_collares (titulo, imagen, texto) VALUES (:titulo, :imagen, :texto)');
		$statement->execute(
			array(':titulo' => $_POST['titulo'], 
				':imagen' => $_FILES['foto']['name'], 
				':texto' => $_POST['texto']));

		header('Location:galeria_collares.php');
	} else {
		$error = "El archivo no es una imagen o el archivo es muy pesado";
	}
}

require 'views/subir_collares.view.php';

?>
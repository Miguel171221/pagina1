<?php 

require 'funciones.php';
$fotos_por_pagina = 8;

$pagina_actual = (isset($_GET['p']) ? (int)$_GET['p'] : 1);
$inicio = ($pagina_actual > 1) ? $pagina_actual * $fotos_por_pagina - $fotos_por_pagina : 0;

$conexion = conexion('galeria_tesis', 'root', '');

if (!$conexion) {
    //debe direccionar a una pagina error
    die();
}

// Traemos las fotos de la base de datos
$statement = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM fotos_collares LIMIT $inicio, $fotos_por_pagina");
$statement->execute();
$fotos = $statement->fetchAll();

// Si no hay fotos entonces redirigimos a una pagina de error
# Tambien puede ser que no haya fotos porque el usuario intento acceder a una foto modificando la URL
if (!$fotos) {
    header('Location: galeria_principal.php');
}

// Ejecutamos otra consulta para conocer el numero de paginas que tendremos
$statement = $conexion->prepare("SELECT FOUND_ROWS() as total_filas");
$statement->execute();
$total_post = $statement->fetch()['total_filas'];

$total_paginas = ($total_post / $fotos_por_pagina);
$total_paginas = ceil($total_paginas);

require 'views/galeria_collares.view.php';

?>
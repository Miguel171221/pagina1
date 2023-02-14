<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<title>Galeria</title>
	<link rel="stylesheet" href="css/estilos_collares.css">
</head>
<body>
	<header>
		<div class="contenedor">
			<h1 class="titulo">Galeria</h1>
		</div>
	</header>

	<div class="fotos">
		<div class="contenedor">
			<?php foreach($fotos as $foto): ?>
			<div class="thumb">
				<a href="foto_collar.php?id=<?php echo $foto['id']; ?>">
					<img src="fotos/<?php echo $foto['imagen']; ?>" alt="">
				</a>
			</div>
			<?php endforeach; ?>

				<div class="paginacion">
					
						<?php if ($pagina_actual != 1): ?>
							<a href="galeria_collares.php?p=<?php echo $pagina_actual -1; ?>" class="izquierda"><i class="fa fa-long-arrow-left"></i> Pagina Anterior</a>
						<?php endif ?>

					
						<?php if ($total_paginas != $pagina_actual): ?>
							<a href="galeria.php?p=<?php echo $pagina_actual +1; ?>" class="derecha">Pagina Siguiente <i class="fa fa-long-arrow-right"></i></a>
						<?php endif ?>
				</div>
		</div>
	</div>
</body>
</html>
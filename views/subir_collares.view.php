<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/estilos_subir_collares.css">
</head>
<body>
	<header>
		<div class="contenedor">
			<h1 class="titulo">Subir Foto</h1>
		</div>
	</header>

	<div class="contenedor">
		<form class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
			
			<label for="foto">Seleciona tu foto</label>
			<input type="file" name="foto" id="foto">

			<label for="titulo">Titulo de la foto</label>
			<input type="text" name="titulo" id="titulo">

			<label for="texto">Descripcion:</label>
			<textarea name="texto" name="foto" id="texto" placeholder="Ingresa una descripcion de la imagen"></textarea>

			<?php if (isset($error)): ?>
				<p class="error"><?php echo $error; ?></p>
			<?php endif; ?>

			<input class="submit" type="submit" value="Subir Foto">

		</form>
	</div>
</body>
</html>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>PHP</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>
			<?php	
				if (empty($_POST)==false) {
					


		}
		else {
			
			echo "<form name=\"datos\" action=\"upload.php\" method=\"post\" enctype=\"multipart/form-data\">
			<label for=\"texto\">Nom</label>
			<input type=\"text\" name=\"texto\">
			<input type=\"file\" name=\"archivo\">
			<label for=\"archivo\">Examinar</label>
			<button type=\"submit\">Enviar</button>
			</form>";
			}
	
			?>

	</body>
</html>
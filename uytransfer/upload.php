<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>PHP</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>

	<body>
			<?php	
				if (empty($_POST)==false) {
					if (!file_exists("files")) {
						mkdir("files");
					}
					$destination_path ="files/".$_FILES['archivo']['name']; 
					move_uploaded_file($_FILES['archivo']['tmp_name'],$destination_path);
					echo "Enviado";

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
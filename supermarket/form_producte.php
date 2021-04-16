<?php
	require "header.php";
?>
		<div class="container m-5 mx-auto text-white">
			<form action=form_producte.php method="post" enctype="multipart/form-data">
				<?php
				include "config.php";
					if (empty($_GET)==false) {
						$sql = "SELECT * FROM productes WHERE codi = '$_GET[codi]'";
						$result =$conn ->query($sql);
						$row = $result->fetch_assoc();
						echo "
						<div class=\"row\">
					<div class=\"col-4 offset-2\">
						<div class=\"form-group\">
							<label for=\"codi\">Codi:</label>
							<input type=\"text\" class=\"form-control\" name=\"codi\" id=\"codi\" value=\"$row[codi]\" />
						</div>
						<div class=\"form-group\">
							<label for=\"nom\">Nom:</label>
							<input type=\"text\" class=\"form-control\" name=\"nom\" id=\"nom\" value=\"$row[nom]\"/>
						</div>
						<div class=\"form-group\">
							<label for=\"categoria\">Categoria:</label>
							<select class=\"form-control\" name=\"categoria\" id=\"categoria\">
								<option value=\"\">Selecciona una opció</option>";
								$sql = "SELECT id_categoria, nom FROM categories ORDER BY nom";
								$result =$conn->query($sql);
								$row2 = $result->fetch_assoc();
								while ($row2) {
									if ($row["categoria"]==$row2["id_categoria"]) {
									echo "<option selected value=\"$row2[id_categoria]\">$row2[nom]</option>";
									}
									else {
									echo "<option value=\"$row2[id_categoria]\">$row2[nom]</option>";
									}
								$row2 = $result->fetch_assoc();	
								}
								echo "
							</select>
						</div>
						<div class=\"form-group\">
							<label for=\"preu\">Preu:</label>
							<input type=\"number\" class=\"form-control\" name=\"preu\" id=\"preu\" value=\"$row[preu]\" />
						</div>
						<div class=\"form-group\">
							<label for=\"stock\">Unitats en stock:</label>
							<input type=\"number\" class=\"form-control\" name=\"stock\" id=\"stock\" value=\"$row[unitats_stock]\"/>
						</div>
						<div class=\"form-group text-right\">
							<a href=\"productes.php\" class=\"btn btn-outline-secondary mx-2\">Tornar</a>
							
							<button type=\"submit\" class=\"btn btn-default\" name=\"actualitzar\" value=\"1\">Guardar</button>
						</div>
					</div>
					<div class=\"col-4\">
						<div class=\"form-group\">
							<label for=\"imatge\">Imatge:</label>
							<input type=\"file\" class=\"form-control\" name=\"imatge\" id=\"imatge\"/>
						</div>
						<div class=\"text-center\">
							<img src=\"$row[imatge]\" class=\"img-thumbnail\" style=\"height: 250px;\" />
						</div>
					</div>
				</div>";
					}
					else if (empty($_POST)==false) {
						$destination_path ="images/productes/".$_FILES['imatge']['name']; 
						$nombre = strval($_POST["codi"]).".".substr($destination_path,-3);
						$codigo = $_POST["codi"];
						$categoria = $_POST["categoria"];
						$nombreProducto = $_POST["nom"];
						$precio = $_POST["preu"];
						$unistock = $_POST["stock"];
						move_uploaded_file($_FILES['imatge']['tmp_name'],$destination_path);
						rename($destination_path,"images/productes/".$nombre);
						if (empty($_POST["actualitzar"])) {
							echo "HOLA";
						
						$sql = "INSERT INTO productes (codi, categoria, nom, preu, unitats_stock, imatge) VALUES ('$codigo', $categoria, '$nombreProducto',$precio,$unistock, 'images/productes/$nombre')";
						$result =$conn->query($sql);
						if ($result) {
							echo "<div class=\"alert alert-success\" role=\"alert\">Producte inserit correctament</div>";
						}
						else {
							echo "<div class=\"alert alert-danger\" role=\"alert\">Error! No s'ha pogut inserir el producte</div>";
						}
						}
						else {
							//,categoria=$categoria,nom='$nombreProducto',preu=$precio,unitats_stock=$unistock,imatge='images/productes/$nombre'
						$sql = "UPDATE productes
								set codi='$codigo',nom='$nombreProducto',preu=$precio,unitats_stock=$unistock,imatge='images/productes/$nombre',categoria=$categoria
								where codi='$codigo'";
								$result =$conn->query($sql);
								if ($result) {
						echo "<div class=\"alert alert-success\" role=\"alert\">Producte actualitzat correctament</div>";
						}
						else {
							echo "<div class=\"alert alert-danger\" role=\"alert\">Error! No s'ha pogut actualitzar el producte</div>";
						}
						}
						

						
						echo "
						<div class=\"row\">
					<div class=\"col-4 offset-2\">
						<div class=\"form-group\">
							<label for=\"codi\">Codi:</label>
							<input type=\"text\" class=\"form-control\" name=\"codi\" id=\"codi\" value=\"$_POST[codi]\" />
						</div>
						<div class=\"form-group\">
							<label for=\"nom\">Nom:</label>
							<input type=\"text\" class=\"form-control\" name=\"nom\" id=\"nom\" value=\"$_POST[nom]\"/>
						</div>
						<div class=\"form-group\">
							<label for=\"categoria\">Categoria:</label>
							<select class=\"form-control\" name=\"categoria\" id=\"categoria\">
								<option value=\"\">Selecciona una opció</option>";
								$sql = "SELECT id_categoria, nom FROM categories ORDER BY nom";
								$result =$conn->query($sql);
								$row = $result->fetch_assoc();
								while ($row) {
									if ($_POST["categoria"]==$row["id_categoria"]) {
									echo "<option selected value=\"$row[id_categoria]\">$row[nom]</option>";
									}
									else {
									echo "<option value=\"$row[id_categoria]\">$row[nom]</option>";
									}
								$row = $result->fetch_assoc();	
								}
								echo "
							</select>
						</div>
						<div class=\"form-group\">
							<label for=\"preu\">Preu:</label>
							<input type=\"number\" class=\"form-control\" name=\"preu\" id=\"preu\" value=\"$_POST[preu]\" />
						</div>
						<div class=\"form-group\">
							<label for=\"stock\">Unitats en stock:</label>
							<input type=\"number\" class=\"form-control\" name=\"stock\" id=\"stock\" value=\"$_POST[stock]\"/>
						</div>
						<div class=\"form-group text-right\">
							<a href=\"productes.php\" class=\"btn btn-outline-secondary mx-2\">Tornar</a>
							<button type=\"submit\" class=\"btn btn-default\" "; if (empty($_POST["actualitzar"])==false) {echo "name=\"actualitzar\" value=\"1\">Guardar</button>";}else {echo ">Guardar</button>";}
							echo "
						</div>
					</div>
					<div class=\"col-4\">
						<div class=\"form-group\">
							<label for=\"imatge\">Imatge:</label>
							<input type=\"file\" class=\"form-control\" name=\"imatge\" id=\"imatge\"/>
						</div>
						<div class=\"text-center\">
							<img src=\"images/productes/$nombre\" class=\"img-thumbnail\" style=\"height: 250px;\" />
						</div>
					</div>
				</div>";


					
					}
					else {
						echo "
						<div class=\"row\">
					<div class=\"col-4 offset-2\">
						<div class=\"form-group\">
							<label for=\"codi\">Codi:</label>
							<input type=\"text\" class=\"form-control\" name=\"codi\" id=\"codi\" />
						</div>
						<div class=\"form-group\">
							<label for=\"nom\">Nom:</label>
							<input type=\"text\" class=\"form-control\" name=\"nom\" id=\"nom\" />
						</div>
						<div class=\"form-group\">
							<label for=\"categoria\">Categoria:</label>
							<select class=\"form-control\" name=\"categoria\" id=\"categoria\">
								<option value=\"\">Selecciona una opció</option>";
								$sql = "SELECT id_categoria, nom FROM categories ORDER BY nom";
								$result =$conn->query($sql);
								$row = $result->fetch_assoc();
								while ($row) {
								echo "<option value=\"$row[id_categoria]\">$row[nom]</option>";
								$row = $result->fetch_assoc();	
								}
								echo "
							</select>
						</div>
						<div class=\"form-group\">
							<label for=\"preu\">Preu:</label>
							<input type=\"number\" class=\"form-control\" name=\"preu\" id=\"preu\" />
						</div>
						<div class=\"form-group\">
							<label for=\"stock\">Unitats en stock:</label>
							<input type=\"number\" class=\"form-control\" name=\"stock\" id=\"stock\" />
						</div>
						<div class=\"form-group text-right\">
							<a href=\"productes.php\" class=\"btn btn-outline-secondary mx-2\">Tornar</a>
							<button type=\"submit\" class=\"btn btn-default\">Guardar</button>
						</div>
					</div>
					<div class=\"col-4\">
						<div class=\"form-group\">
							<label for=\"imatge\">Imatge:</label>
							<input type=\"file\" class=\"form-control\" name=\"imatge\" id=\"imatge\" />
						</div>
						<div class=\"text-center\">
							<img src=\"images/productes/no-image.png\" class=\"img-thumbnail\" style=\"height: 250px;\" />
						</div>
					</div>
				</div>";



					}

				?>
				
			</form>
		</div>
	</body>
</html>

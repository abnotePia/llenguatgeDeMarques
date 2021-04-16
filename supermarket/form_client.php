<?php
	require "header.php";
?>
	<?php
	if (empty($_POST)){
		echo "<div class=\"container m-5 mx-auto text-white\">
			<form action=\"form_client.php\" method=\"post\">
				<div class=\"row\">
					<div class=\"col-4 offset-2\">
						<div class=\"form-group\">
							<label for=\"username\">Nom d'usuari (obligatori):</label>
							<input type=\"text\" class=\"form-control\" name=\"username\" id=\"username\" />
						</div>
						<div class=\"form-group\">
							<label for=\"pass\">Contrasenya (obligatori):</label>
							<input type=\"password\" class=\"form-control\" name=\"pass\" id=\"pass\" />
						</div>
						<div class=\"form-group\">
							<label for=\"rp_pass\">Repeteix la contrasenya (obligatori):</label>
							<input type=\"password\" class=\"form-control\" name=\"rp_pass\" id=\"rp_pass\" />
						</div>
						<div class=\"form-group\">
							<label for=\"nombre\">Nom (obligatori):</label>
							<input type=\"text\" class=\"form-control\" name=\"nombre\" id=\"nombre\" />
						</div>
						<div class=\"form-group\">
							<label for=\"apellidos\">Cognoms (obligatori):</label>
							<input type=\"text\" class=\"form-control\" name=\"apellidos\" id=\"apellidos\" />
						</div>
						<div class=\"form-group\">
							<label for=\"nif\">NIF (obligatori):</label>
							<input type=\"text\" class=\"form-control\" name=\"nif\" id=\"nif\" />
						</div>
					</div>
					<div class=\"col-4\">
						<div class=\"form-group\">
							<label for=\"direccion\">Adreça (obligatori):</label>
							<input type=\"text\" class=\"form-control\" name=\"direccion\" id=\"direccion\" />
						</div>
						<div class=\"form-group\">
							<label for=\"codigo_postal\">Codi postal (obligatori):</label>
							<input type=\"text\" class=\"form-control\" name=\"codigo_postal\" id=\"codigo_postal\" />
						</div>
						<div class=\"form-group\">
							<label for=\"poblacion\">Població (obligatori):</label>
							<select class=\"form-control\" name=\"poblacion\" id=\"poblacion\">
								<option value=\"\">Selecciona una opció</option>";
								include "config.php";
								$sql = "SELECT id_poblacio,nom FROM poblacions order by nom";
								$result =$conn ->query($sql);
								$row = $result->fetch_assoc();
								while ($row) {
								echo "<option value=\"$row[id_poblacio]\">$row[nom]</option>";
								$row = $result->fetch_assoc();	
								}
								echo "</select>
								</div>
						<div class=\"form-group\">
							<label for=\"telefono\">Telèfon:</label>
							<input type=\"text\" class=\"form-control\" name=\"telefono\" id=\"telefono\" />
						</div>
						<div class=\"form-group\">
							<label for=\"codigo_postal\">Email:</label>
							<input type=\"text\" class=\"form-control\" name=\"mail\" id=\"mail\" />
						</div>
						<div class=\"form-group text-right\">
							<button type=\"submit\" class=\"btn btn-default\">Enviar</button>
						</div>
					</div>
				</div>
			</form>
		</div>";
		}
	?>
	
								
						
							<?php
							include "common/validacions.php";
							include "config.php";
								if (empty($_POST)==false) {
									$incorrecte=true;
									$nombreusuario=$_POST["username"];
									$contra=$_POST["pass"];
									$nom=$_POST["nombre"];
									$cognoms=$_POST["apellidos"];
									$nif=$_POST["nif"];
									$adreca=$_POST["direccion"];
									$codi=$_POST["codigo_postal"];
									$poblacio=$_POST["poblacion"];
									$telefon=$_POST["telefono"];
									$email=$_POST["mail"];
									if (nomUsuariValid($_POST["username"])) {
										if ($_POST["pass"] == $_POST["rp_pass"]) {
											if (seguretatContrasenya($_POST["pass"]) == 3) {
												if (NIFValid($_POST["nif"])) {
													if (empty($_POST["mail"]) == false) {
														$incorrecte=false;
														if (esEmail($_POST["mail"])) {
															$sql = "INSERT INTO clients (nom_usuari, contrasenya, nom, cognoms, nif, adreca, codi_postal, poblacio, telefon, email)
															VALUES('$nombreusuario','$contra','$nom','$cognoms','$nif','$adreca','$codi',$poblacio,'$telefon','$email')";
															$result =$conn->query($sql);
														}
													}
													else {
														$sql = "INSERT INTO clients (nom_usuari, contrasenya, nom, cognoms, nif, adreca, codi_postal, poblacio, telefon, email)
															VALUES('$nombreusuario','$contra','$nom','$cognoms','$nif','$adreca','$codi',$poblacio,'$telefon','$email')";
															$result =$conn->query($sql);

													}
													header("Location: entrar.php");
												}
											}

										}
									}
									
									if ($incorrecte) {
										echo "
										<div class=\"alert alert-danger text-center\" role=\"alert\" style:\"text-align: center;\"><div>Se ha producido un error</div></div>
				<div class=\"container m-5 mx-auto text-white\">
					<form action=\"form_client.php\" method=\"post\">
						<div class=\"row\">
							<div class=\"col-4 offset-2\">
								<div class=\"form-group\">
									<label for=\"username\">Nom d'usuari (obligatori):</label>
									<input type=\"text\" class=\"form-control\" name=\"username\" id=\"username\" value=\"$_POST[username]\"/>
								</div>
								<div class=\"form-group\">
									<label for=\"pass\">Contrasenya (obligatori):</label>
									<input type=\"password\" class=\"form-control\" name=\"pass\" id=\"pass\" value=\"$_POST[pass]\"/>
								</div>
								<div class=\"form-group\">
									<label for=\"rp_pass\">Repeteix la contrasenya (obligatori):</label>
									<input type=\"password\" class=\"form-control\" name=\"rp_pass\" id=\"rp_pass\" value=\"$_POST[rp_pass]\"/>
								</div>
								<div class=\"form-group\">
									<label for=\"nombre\">Nom (obligatori):</label>
									<input type=\"text\" class=\"form-control\" name=\"nombre\" id=\"nombre\" value=\"$_POST[nombre]\"/>
								</div>
								<div class=\"form-group\">
									<label for=\"apellidos\">Cognoms (obligatori):</label>
									<input type=\"text\" class=\"form-control\" name=\"apellidos\" id=\"apellidos\" value=\"$_POST[apellidos]\"/>
								</div>
								<div class=\"form-group\">
									<label for=\"nif\">NIF (obligatori):</label>
									<input type=\"text\" class=\"form-control\" name=\"nif\" id=\"nif\" value=\"$_POST[nif]\"/>
								</div>
							</div>
							<div class=\"col-4\">
								<div class=\"form-group\">
									<label for=\"direccion\">Adreça (obligatori):</label>
									<input type=\"text\" class=\"form-control\" name=\"direccion\" id=\"direccion\" value=\"$_POST[direccion]\"/>
								</div>
						<div class=\"form-group\">
							<label for=\"codigo_postal\">Codi postal (obligatori):</label>
							<input type=\"text\" class=\"form-control\" name=\"codigo_postal\" id=\"codigo_postal\" value=\"$_POST[codigo_postal]\"/>
						</div>
						<div class=\"form-group\">
							<label for=\"poblacion\">Població (obligatori):</label>
							<select class=\"form-control\" name=\"poblacion\" id=\"poblacion\" value=\"$_POST[poblacion]\">
								<option value=\"\">Selecciona una opció</option>";
								
								include "config.php";
								$sql = "SELECT id_poblacio,nom FROM poblacions order by nom";
								$result =$conn ->query($sql);
								$row = $result->fetch_assoc();
								while ($row) {
								echo "<option value=\"$row[id_poblacio]\">$row[nom]</option>";
								$row = $result->fetch_assoc();	
								}
								echo "
								
									</select>
									</div>
								<div class=\"form-group\">
									<label for=\"telefono\">Telèfon:</label>
									<input type=\"text\" class=\"form-control\" name=\"telefono\" id=\"telefono\" value=\"$_POST[telefono]\"/>
								</div>
								<div class=\"form-group\">
									<label for=\"codigo_postal\">Email:</label>
									<input type=\"text\" class=\"form-control\" name=\"mail\" id=\"mail\" value=\"$_POST[mail]\"/>
								</div>
								<div class=\"form-group text-right\">
									<button type=\"submit\" class=\"btn btn-default\">Enviar</button>
								</div>
							</div>
						</div>
					</form>
				</div>";
					
									}


								}
								$conn->close();
							?>
						
	</body>
</html>

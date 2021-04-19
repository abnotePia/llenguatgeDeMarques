<?php
	require "header.php";
	include "config.php";
?>
		<div class="container m-5 mx-auto">
			<div class="col-8 offset-2">
				<table class="table">        
					<tr> 
						<th>Producte</th> 
						<th>Categoria</th>
						<th>Preu</th>
						<th></th>
					</tr>
					<?php
						if (empty($_POST["codi"])==false) {
							$codi = $_POST["codi"];
							$sql = "DELETE FROM productes WHERE codi = '$codi'";
							$result =$conn ->query($sql);
						}
					$sql = "SELECT productes.codi,productes.categoria,productes.nom,productes.preu,productes.imatge,categories.nom as cat FROM productes
							inner join categories on categories.id_categoria =  productes.categoria";
							
							$result =$conn ->query($sql);
							$row = $result->fetch_assoc();

								while ($row) {
									echo "<tr>
									<td class=\"align-middle\">
								<img src=\"$row[imatge]\" class=\"img-thumbnail mr-2\" style=\"height: 50px;\" />
								$row[nom]
							</td>
							<td class=\"align-middle\">$row[cat]</td>
							
							<td class=\"align-middle\">
								<form class=\"form-inline\" action=\"productes.php\" method=\"post\">
								<a href=\"form_producte.php?codi=$row[codi]\" class=\"btn btn-primary\"><i class=\"fas fa-pencil-alt\"></i></a>
								<div class=\"form-group\">
									<input type=\"hidden\" name=\"codi\" value=\"$row[codi]\" />
								</div>
								<button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-trash-alt\"></i></button>
								</form>
							</td> 
						</tr>";
								$row = $result->fetch_assoc();	
								}

					?>
					
						
				</table>
			</div>
		</div>
	</body>
</html>

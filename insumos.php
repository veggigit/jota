<?php

$conexion = new mysqli("localhost", "root", "", "juan");
$sql='hola';
global $sql;
$as='as';
global $as;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Clase cortesía</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="mystyle.css">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#"><img style="width: 100px; height: auto" src="assets/sabor.jpg"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="http://trabajoweb.cl/produccion/panel.php">
						<button type="button" class="btn btn-warning">SOLICITUD A PRODUCCION </button>
						<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="http://trabajoweb.cl/produccion/insumos.php"><button type="button" class="btn btn-warning">INGRESO DE INSUMOS</button></a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 mt-5 mb-5">
				<h1>HOLA <?php echo $_SESSION['usuario']; ?></h1>
				<h6>Recuerda cerrar sesión al terminar</h6>
				<a href="cerrar_session.php"><button type="button" class="btn btn-warning">Cerrar sesión</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3>MANTENEDOR DE INSUMOS</h3>
			</div>
			<div class="col-md-12">
				<h3>Selecciona categoría:</h3>
				<form action="insumos.php" method="POST" class="text-center">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="inputGroupSelect01">Opción</label>
						</div>
						<select class="custom-select" name="cat">
							<option selected>Elegir...</option>
							<?php
							//traer categorias
							$resultados = mysqli_query($conexion, "SELECT * FROM Insumos WHERE MATCH (IDInsumo,InsDesc) AGAINST ('CATEGORIA' IN NATURAL LANGUAGE MODE);");
							while ($consulta = mysqli_fetch_array($resultados)) {
								echo "<option value=" . $consulta['IDInsumo'] . ">" . $consulta['InsDesc'] . "</option>";
							}
							?>
						</select>
					</div>
					<button type="submit" class="btn btn-warning " name="botontaller">buscar</button>
				</form>
			</div>
		</div>
		<div class="row mt-5">
			<?php
			if (isset($_POST['botontaller'])) { ?>
				<div class="table-responsive table-striped table-hover  table-bordered text-center">

					<table class="table">
						<thead>
							<tr>
								<th scope="col">Nombre</th>
								<th scope="col">Id</th>
								<th scope="col">Ultimo ingreso</th>
								<th scope="col">Stock mínimo</th>
								<th scope="col">Stock máximo</th>
								<th scope="col">Stock actual</th>
								<th scope="col">Cantidad</th>
								<th scope="col">ingresar nueva cantidad (Gr.)</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$valorinsumo = $_POST['cat'];
						$as=$valorinsumo;
						$sql = "SELECT * FROM Insumos WHERE (substring(IDInsumo,1,2) = substring('$valorinsumo',1,2) )";
						$resultadocat = mysqli_query($conexion, $sql);
						while ($consultacat = mysqli_fetch_array($resultadocat)) {
							echo "
									<form id='formqty' class='text-center'>
										<tr class='row_element'>
											<td>" . $consultacat['InsDesc'] . "</td>
											<td class='row-id'>" . $consultacat['IDInsumo'] . "</td>
											<td>" . $consultacat['InsFecUltCompra'] . "</td>
											<td>" . $consultacat['InsMinStock'] . "</td>
											<td>" . $consultacat['InsMaxStock'] . "</td>
											<td>" . $consultacat['InsStockActual'] . "</td>
											<td>" . $consultacat['InsCantidad'] . "</td>
											<td>
											<div class='input-group text-center'>
												<input type='number' name='gramos[]' value='' class='row-newqty form-control' aria-label='Peso (en gramos)'>
											</div> 
											</td>
										</tr>
								";
						};
						echo "</tbody>
					</table>";
						echo "<button id='launch' type='submit' class='btn btn-warning mt-5 mb-5'>Gurdar cantidades en gramos</button>
							</form>";
					}
						?>
				</div>
		</div>
	</div>
	<!-- NOTE: Se cambia version jquer, ahi tu ves que onda -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<!-- NOTE: Usé axios para mandar la data sin refrescar, es como ajax pero mejor -->
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<!-- NOTE: Dejé en un archivo aparte el mapeo de la data -->
	<script src="./js/app.js"></script>
</body>

</html>
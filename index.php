<?php session_start(); ?>
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

	<div class="container">
		<div class="row">
			<div class="col-md-5"></div>
			<div class="col-md-2  centrar  margen1">
				<img class="img-fluid" src="assets/sabor.jpg">
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">

				<form action="validar.php" method="POST">
					<div class="form-group">
						<label for="exampleInputEmail1">USUARIO</label>
						<input type="text" required class="form-control" id="exampleInputEmail1" name="usuario" pattern="[A-Za-z0-9
			_-]{1,15}" aria-describedby="emailHelp" placeholder="Ingresa tu nombre de usuario">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">PASSWORD</label>
						<input type="password" required class="form-control" id="exampleInputPassword1" name="pass" pattern="[A-Za-z0-9
			_-]{1,15}" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-outline-dark">Acceder</button>
				</form>

			</div>
		</div>
	</div>






	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
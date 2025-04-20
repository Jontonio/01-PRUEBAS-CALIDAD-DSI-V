<html>
<head>
	<title>Registrar usuario</title>
	<?php require('header.php') ?>

</head>

<body>
	<div class="container-fluid">
		<h2 class="text-center p-3">Registrar usuario</h2>
		<p><a href="index.php" class="btn btn-secondary">Panel principal</a></p>
		<form action="addAction.php" method="post" name="add" enctype="multipart/form-data" >
			<table width="50%" border="0">
				<tr> 
					<td>Nombres</td>
					<td><input type="text" name="name" class="form-control mt-2 col"></td>
				</tr>
				<tr> 
					<td>Edad</td>
					<td><input type="text" name="age" class="form-control mt-2"></td>
				</tr>
				<tr> 
					<td>correo</td>
					<td><input type="text" name="email" class="form-control mt-2"></td>
				</tr>
				<tr> 
					<td>Contraseña</td>
					<td><input type="text" name="password" class="form-control mt-2"></td>
				</tr>
				<tr> 
					<td>Foto</td>
					<td><input type="file" name="photo" class="form-control mt-2"></td>
				</tr>
				<tr> 
					<td></td>
					<td><input type="submit" name="submit" value="Registrar" class="btn btn-success mt-2 w-50"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>


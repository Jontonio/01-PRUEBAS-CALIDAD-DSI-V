<?php

	session_start(); 

	require_once("dbConnection.php");

	$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<html>
<head>	
	<title>AdminU</title>
	<?php require('header.php') ?>
</head>

<body>
	<div class="container-fluid">
		<h2 class="text-center p-2">Lista de usuarios</h2>
		<div class="d-flex justify-content-between">
			<p class="d-flex">
				<?php 
				if (isset($_SESSION['user_id'])) { 
					echo '<a href="add.php" class="btn btn-primary">Agregar nuevo usuario</a>';
				}else{
					echo '<a class="btn btn-primary" disable="true" style="pointer-events: none; opacity: 0.5;">Agregar nuevo usuario</a>';
				}
				
				?>
			</p>
			<p class="d-flex">
				<?php
				 if (isset($_SESSION['user_id'])) { 
					 echo '<a href="logout.php" class="btn btn-success">cerrar sesión</a>';
					} else{
					 echo '<a href="login.php" class="btn btn-success">Iniciar sesión</a>';
				 }
				?>
			</p>
		</div>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Edad</th>
					<th>Email</th>
					<th>Contraseña</th>
					<th>Foto</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($res = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$res['name']."</td>";
					echo "<td>".$res['age']."</td>";
					echo "<td>".$res['email']."</td>";
					echo "<td>".$res['password']."</td>";
					
					$imagePath = $res['file_path'];

					if (!empty($imagePath) && file_exists($imagePath)) {
						echo "<td><img src='$imagePath' alt='Foto' width='80'></td>";
					} else {
						echo "<td>Sin foto</td>";
					}

					if (isset($_SESSION['user_id'])) {
						echo "<td>
								<a href=\"edit.php?id={$res['id']}\" class='btn btn-primary btn-sm'>Editar</a> 
								<a href=\"delete.php?id={$res['id']}\" onClick=\"return confirm('¿Estás seguro de eliminar al usuario?')\" class='btn btn-danger btn-sm'>Eliminar</a>
							</td>";
					} else {
						echo "<td>
								<a class='btn btn-primary btn-sm' style='pointer-events: none; opacity: 0.5;'>Editar</a> 
								<a style='pointer-events: none; opacity: 0.5;' class='btn btn-danger btn-sm'>Eliminar</a>
							</td>";
					}
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>

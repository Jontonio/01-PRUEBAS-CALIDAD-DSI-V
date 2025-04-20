<?php
	// Include the database connection file
	require_once("dbConnection.php");

	session_start(); 

	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php");
		exit();
	}


	$id = $_GET['id'];

	// Select data associated with this particular id
	$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id");

	// Fetch the next row of a result set as an associative array
	$resultData = mysqli_fetch_assoc($result);

	$name = $resultData['name'];
	$age = $resultData['age'];
	$email = $resultData['email'];
	
?>
<html>
<head>	
	<title>Edit Data</title>
	<?php require('header.php') ?>
</head>

<body>
	<div class="container-fluid">
		<h2 class="text-center">Editar usuarios</h2>
		<p>
			<a href="index.php" class="btn btn-secondary">Panel principal</a>
		</p>	
		<form name="edit" method="post" action="editAction.php" method="post" enctype="multipart/form-data">
			<table border="0">
				<tr> 
					<td>Nombres</td>
					<td><input type="text" name="name" value="<?php echo $name; ?>" class="form-control mt-2"></td>
				</tr>
				<tr> 
					<td>Edad</td>
					<td><input type="text" name="age" value="<?php echo $age; ?>" class="form-control mt-2"></td>
				</tr>
				<tr> 
					<td>Correo</td>
					<td><input type="text" name="email" value="<?php echo $email; ?>" class="form-control mt-2"></td>
				</tr>
				<tr> 
					<td>Foto</td>
					<td><input type="file" name="photo" class="form-control mt-2"></td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value=<?php echo $id; ?> class="form-control mt-2"></td>
					<td><input type="submit" name="update" value="Actualizar" class="btn btn-success mt-1 w-100"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>

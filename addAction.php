<html>
<head>
	<title>Registrar usuario</title>
</head>

<body>
<?php
require_once("dbConnection.php");

if (isset($_POST['submit'])) {

	$name =  $_POST['name'];
	$age =  $_POST['age'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$file_name = '';
	$file_tmp = '';
	$file_path = '';

	if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
		$file_name = $_FILES['photo']['name'];
		$file_tmp = $_FILES['photo']['tmp_name'];
		$file_path = "uploads/" . basename($file_name);

		if (!file_exists('uploads')) {
			mkdir('uploads', 0777, true);
		}
	}

	if (empty($name) || empty($age) || empty($email) || empty($file_name)) {
		if (empty($name)) echo "<font color='red'>El campo nombre está vacío.</font><br/>";
		if (empty($age)) echo "<font color='red'>El campo edad está vacío.</font><br/>";
		if (empty($email)) echo "<font color='red'>El campo correo está vacío.</font><br/>";
		if (empty($file_name)) echo "<font color='red'>No se ha seleccionado un archivo.</font><br/>";
		
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else {
		if (move_uploaded_file($file_tmp, $file_path)) {

			$result = mysqli_query($mysqli, "INSERT INTO users (`name`, `age`, `email`, `file_path`, `password`) VALUES ('$name', '$age', '$email', '$file_path','$password')");
			
			echo "<p><font color='green'>¡Datos y archivo subidos correctamente!</font></p>";
			echo "<a href='index.php'>Ver resultados</a>";
		} else {
			echo "<font color='red'>Error al subir el archivo.</font><br/>";
			echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
		}
	}
}
?>
</body>
</html>

<?php
require_once("dbConnection.php");

if (isset($_POST['update'])) {

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	

	$newFilePath = '';

	if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
		$file_name = $_FILES['photo']['name'];
		$file_tmp = $_FILES['photo']['tmp_name'];
		$newFilePath = "uploads/" . basename($file_name);

		if (!file_exists('uploads')) {
			mkdir('uploads', 0777, true);
		}

		move_uploaded_file($file_tmp, $newFilePath);
	}

	if (empty($name) || empty($age) || empty($email)) {
		if (empty($name)) echo "<font color='red'>El campo nombre está vacío.</font><br/>";
		if (empty($age)) echo "<font color='red'>El campo edad está vacío.</font><br/>";
		if (empty($email)) echo "<font color='red'>El campo correo está vacío.</font><br/>";
	} else {

		if (!empty($newFilePath)) {
			$query = "UPDATE users SET `name`='$name', `age`='$age', `email`='$email', `file_path`='$newFilePath' WHERE `id`=$id";
		} else {
			$query = "UPDATE users SET `name`='$name', `age`='$age', `email`='$email' WHERE `id`=$id";
		}

		$result = mysqli_query($mysqli, $query);

		echo "<p><font color='green'>¡Datos actualizados correctamente!</font></p>";
		echo "<a href='index.php'>Ver resultados</a>";
	}
}
?>

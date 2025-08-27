<html>
<head>
    <title>Validar credenciales</title>
	<?php require('header.php') ?>
    
</head>
<body>

<div class="container text-center">
<?php

require_once("dbConnection.php"); // Asegúrate de que esta conexión esté correctamente configurada.

session_start(); // Inicia la sesión

if (isset($_POST['submit'])) {

    $correo =  $_POST['correo'];
    $password = $_POST['password'];

    if (empty($correo) || empty($password)) {
        if (empty($correo)) echo "<font color='red'>El campo correo está vacío.</font><br/>";
        if (empty($password)) echo "<font color='red'>El campo contraseña está vacío.</font><br/>";

        echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
    } else {
        // Verificar si el correo existe en la base de datos
        $query = "SELECT * FROM users WHERE email = '$correo' AND password = '$password'";
        $result = mysqli_query($mysqli, $query);

        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_email'] = $row['email'];
            
            echo "<p class='p-3'>Bienvenido, " . $row['name'] . "!<br/></p>";
            echo "<a href='index.php' class='btn btn-success text-center'>Ir lista de productos</a>";

        } else {
            echo "<font color='red'>Correo no registrado. Intentelo nuevamente</font><br/>";
            echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
        }
    }
}

?>
</div>


</body>
</html>

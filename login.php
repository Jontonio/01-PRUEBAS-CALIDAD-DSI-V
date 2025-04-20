<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php require('header.php') ?>
</head>
<body>
    <div class="container w-50 mt-4">
        <form action="loginAction.php" method="POST" class="card p-4">
            <p class="h3">Inicie sesión para coninuar</p>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo">
                <div id="emailHelp" class="form-text">Digite su correo</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                <label class="form-check-label" for="exampleCheck1">Recordar mi correo</label>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>

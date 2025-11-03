

<?php
$host = 'localhost';
$username = 'proyecto';
$dbname = 'proyecto';
$password = 'questly2025';

$conexion = new mysqli("$host", "$username", "$password", "$dbname");
if ($conexion->connect_error) die("Error de conexión");

$vista = $_GET['vista'] ?? 'login';

function mostrarLogin($conexion)
{
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $sql = "SELECT * FROM usuarios WHERE email='$email' AND password='$pass'";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows == 1) {
            $usuario = $resultado->fetch_assoc();
            echo "<h3>Datos personales:</h3>";
            echo "Email: " . $usuario['email'] . "<br>";
            echo "Nombre: " . $usuario['nombre'] . "<br>";
            echo "Apellidos: " . $usuario['apellidos'] . "<br>";
            echo "Fecha de nacimiento: " . $usuario['fecha_nacimiento'] . "<br>";
        } else {
            echo "<p style='color:red;'>Credenciales incorrectas.</p>";
        }
    }

    echo <<<HTML
    <h2>Login</h2>
    <form method="POST">
        <label for="email">Email: </label><input type="email" name="email" required><br>
        <label for="password">Contraseña: </label><input type="password" name="password" required><br>
        <input type="submit" name="login" value="Entrar">
    </form>
    <!--<p><a href="?vista=registro">Registrarse</a> | <a href="?vista=baja">Darse de baja</a></p>-->
    HTML;
}

function mostrarRegistro($conexion)
{
    if (isset($_POST['registro'])) {
        $email = $_POST['email'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $fecha = $_POST['fecha_nacimiento'];
        $pass = $_POST['password'];
        $repetir = $_POST['repetir_password'];

        if ($pass !== $repetir) {
            echo "<p style='color:red;'>Las contraseñas introducidas no coinciden</p>";
        } else {
            $sql = "INSERT INTO usuarios (email, nombre, apellidos, fecha_nacimiento, password)
                    VALUES ('$email', '$nombre', '$apellidos', '$fecha', '$pass')";
            if ($conexion->query($sql)) {
                echo "<p>Registro exitoso. <a href='?vista=login'>Inicia sesión</a></p>";
            } else {
                echo "<p style='color:red;'>Error al registrar. ¿Ya existe ese email?</p>";
            }
        }
    }

    echo <<<HTML
    <h2>Registro</h2>

    <form method="POST">
        <label for="email">Email:</label> <input type="email" name="email" required><br>
        <label for="nombre">Nombre:</label> <input type="text" name="nombre" required><br>
        <label for="apellidos">Apellidos:</label> <input type="text" name="apellidos" required><br>
        <label for="fecha_nacimiento">Fecha de nacimiento:</label> <input type="date" name="fecha_nacimiento" required><br>
        <label for="password">Contraseña:</label> <input type="password" name="password" required><br>
        <label for="repetir_password">Repetir contraseña:</label> <input type="password" name="repetir_password" required><br>
        <input type="submit" name="registro" value="Registrarse">
    </form>
    <!--<p><a href="?vista=login">Volver al login</a> | <a href="?vista=baja">Darse de baja</a></p>-->
    HTML;
}

function mostrarBaja($conexion)
{
    if (isset($_POST['baja'])) {
        $email = $_POST['email'];
        $nombre = $_POST['nombre'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM usuarios WHERE email='$email' AND nombre='$nombre' AND password='$pass'";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows == 1) {
            $conexion->query("DELETE FROM usuarios WHERE email='$email'");
            echo "<p>El usuario con el email $email se ha dado de baja correctamente.</p>";
        } else {
            echo "<p style='color:red;'>El usuario no existe o la contraseña es incorrecta.</p>";
        }
    }

    echo <<<HTML
    <h2>Darse de baja</h2>
    <form method="POST">
        <label for="email">Email:</label><input type="email" name="email" required><br>
        <label for="nombre">Nombre: </label><input type="text" name="nombre" required><br>
        <label for="password">Contraseña: </label><input type="password" name="password" required><br>
        <input type="submit" name="baja" value="Eliminar cuenta">
    </form>
    <p><a href="?vista=login">Volver al login</a> | <a href="?vista=registro">Registrarse</a></p>
    HTML;
}
?>


<?php
if ($vista === 'registro') {
    mostrarRegistro($conexion);
} elseif ($vista === 'baja') {
    mostrarBaja($conexion);
} elseif ($vista === 'login') {
    mostrarLogin($conexion);
}
?>

</html>
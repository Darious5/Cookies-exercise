<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cookie1</title>
</head>
<body>
<?php
    if (isset($_COOKIE["visitas"])) {
        $visitas = $_COOKIE["visitas"] + 1;
    } else {
        $visitas = 1;
    }
    setcookie("visitas", $visitas, time() + 86400*30, "/");
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"])) {
        setcookie("username", $_POST["usuario"], time() + 86400, "/");
        $username = $_POST["usuario"];
    } else if (isset($_COOKIE["username"])) {
        $username = $_COOKIE["username"];
    } else {
        $username = null;
    }
?>
<?php
    if (empty($_POST["usuario"])){
        echo    "<form action='formulario.php' method='post'>
                    <label for='usuario'>Username:</label>
                    <input type='text' id='usuario' name='usuario'>
                    <input type='submit' value='Guardar'>
                </form>";
    }
    else if ($visitas==1){
        echo "¡Hola ",$username,"! Tu nombre de usuario ha sido guardado en una cookie";
    }
    else if (isset($_COOKIE["username"])){
        echo "¡Hola de nuevo ",$username,"!<br>Tu nombre de usuario almacenado en la cookie sigue siendo: ",$_COOKIE["username"];
        echo "<br>Esta es tu visita numero ",$_COOKIE["visitas"];  
    }
    else echo "<h1>Ha habido un error, por favor, intentelo de nuevo</h1>";
?>
</body>
</html>
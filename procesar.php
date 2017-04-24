<?php
require("php/conexion.php");

switch ($_POST['accion']){
    case "registro":
        mysqli_select_db($conexion, BASEDATOS) or die ("error2".mysqli_error());
        mysqli_query($conexion, "INSERT INTO `usuarios`(`USUARIO`, `EMAIL`, `CONTRASENA`, `AVATAR`, `MAYOR`, `FECHAMAYOR`, `ULTIMO`, `FECHAULTIMO`) VALUES ('$_POST[nombreusuario]','$_POST[email]','$_POST[contrasena1]','$_POST[avatar]',0,0,0,0)");
        echo "Usuario registrado!";
        header("location: game.php");
        break;
    case "acceso":
        mysqli_select_db($conexion, BASEDATOS) or die ("error2".mysqli_error());
        $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE USUARIO='$_POST[nombreusuario]' OR EMAIL='$_POST[nombreusuario]'");
        if (!$consulta){
            die("error3".mysqli_error());
        }
        mysqli_data_seek($consulta, 0);
        while(true){
            $linea = mysqli_fetch_row($consulta);
            if (!$linea){
                break;
            }
            if ($linea[2] == $_POST['contrasena']){
                session_start();
                $_SESSION['nombreusuario'] = $linea[0];
                $_SESSION['email'] = $linea[1];
                $_SESSION['contrasena'] = $linea[2];
                $_SESSION['avatar'] = $linea[3];
                $_SESSION['mayor'] = $linea[4];
                $_SESSION['fechamayor'] = $linea[5];
                $_SESSION['ultimo'] = $linea[6];
                $_SESSION['fechaultimo'] = $linea[7];
                $_SESSION['fecharegistro'] = $linea[8];
                header("location: game.php");
            } else {
                header("location: acceder.php");
            }
        }
        break;
/*        while (mysqli_fetch_row($consulta)){
            $linea = mysqli_fetch_row($consulta);
            if ($linea[1] == $_POST[nombreusuario]){
                if ($line[3] == $_POST[contrasena]){
                    session_start();
                    $_SESSION[nombreusuario] = $_POST[nombreusuario];
                    $_SESSION[contrasena] = $_POST[contrasena];
                    header("location: game.php");
                } else {
                    header("location: acceder.php");
                }
            } else {
                if ($linea[2] == $_POST[nombreusuario]){
                    if ($line[3] == $_POST[contrasena]){
                        session_start();
                        $_SESSION[nombreusuario] = $_POST[nombreusuario];
                        $_SESSION[contrasena] = $_POST[contrasena];
                        header("location: game.php");
                    } else {
                        header("location: acceder.php");
                    }
                } else {
                    continue;
                }
            }
        }‪
        echo "Hola mundo";*/
}
switch ($_GET['accion']){
    case "salida":
        session_start();
        $_SESSION = array();
        session_destroy();
        header("location: index.php");
}
?>

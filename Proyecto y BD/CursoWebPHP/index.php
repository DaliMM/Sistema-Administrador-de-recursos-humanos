<?php

include_once 'page/constantesDelSistema.php';
include_once 'clasesAdmin/seguridad.php';
$objSeguridad = new Seguridad();
$txtpassword= isset($post['txtpassword']) ? 
   $objSeguridad->encriptarPassword($txtpassword): '';
?>
<html>
<meta charset="utf-8">
<title>Admin Personal</title>
<link rel="stylesheet" href="css/styleLogin.css">

<center>
    <form method="post" action="Login/Login.php">
        <table>
        <tr>
            <td align="center"><img src="css/imagenes/Login.jpeg"/>
                <p>Inicio de Sesión 
                <br> 
                <p1>Administrador de Personal</p1></p>
            </td>
        </tr>
        <tr>
            <td><input type="text"  placeholder="Usuario" name="txtusuario" /></td>
        </tr>
        <tr>
            <td><input type="password" placeholder="Contraseña" name="txtpassword" /> </td>
        </tr>
        <tr>
            <td><input type="submit" name="btnEnviar" value="Iniciar Sesión" /> </td>
        </tr>
        </table>
    </form>
</center>
</html>

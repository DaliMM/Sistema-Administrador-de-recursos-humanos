<!DOCTYPE html>
<html lang="en">
    <head>
        <meta>
            <title>SISTEMA ADMINISTRADOR</title>
            <link href="css/styleMenu.css" rel="stylesheet" type="text/css">
            <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
<?php
?>
        </meta>
        <?php
        
        include_once 'page/constantesDelSistema.php';
        include_once ARRAY_UTILS;
        global $objArrayUtils;
        $objArrayUtils = new ArrayUtils();
        $get = filter_input_array(INPUT_GET);
        $post = filter_input_array(INPUT_POST);
        $server = filter_input_array(INPUT_SERVER);
        
        $accion = isset($get['accion']) ? $get['accion'] : (isset($post['accion']) ? $post['accion'] : NULL);
        
        ?>      
    </head> 
    <body>
        
        <?php
        include_once CONTROL_PAGE;      
        ?>       
        <div class="contenedor">
                <br>
                <br>
                <div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="css/imagenes/iconoPersona.png" style=" width: 50px; height: 55px"></div>
                <div class="elemento">
                    <a>Administrador</a>
                    <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    <a href="cerrarsesion.php" style="align-self:left">Cerrar sesión</a>
                </div>
        </div>
        
        <nav>   
            <ul>
              <li><a href="<?= htmlspecialchars($server["PHP_SELF"] . '?accion=insertEmpleado'); ?>">Agregar empleados</a></li>
              <li><a href="<?= htmlspecialchars($server["PHP_SELF"] . '?accion=adminEmpleados'); ?>">Consultar empleados</a></li>
              <li><a href="<?= htmlspecialchars($server["PHP_SELF"] . '?accion=insertArea'); ?>">Agregar Área </a></li>
              <li><a href="<?= htmlspecialchars($server["PHP_SELF"] . '?accion=adminAreas'); ?>">Consultar Área</a></li>
            </ul>
        </nav>

    </body>
</html>
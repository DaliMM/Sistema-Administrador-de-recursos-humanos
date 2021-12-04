<?php

include_once EMPLEADOS_ADMIN;
$objEmpleadosAdmin = new EmpleadosAdmin();

include_once SEGURIDAD;
$objSeguridad = new Seguridad();

include_once STRING_UTILS;
$objStringUtils = new StringUtils();

$arrayStatus = array(1 => 'Activo', 0 => 'Inactivo');

//$objArrayUtils->muestraContenidoDeArrayFormateado($post);

$txtBuscarId = isset($post['txtBuscarId']) ? 
    $objSeguridad->limpiarCadenaSQL($objStringUtils->quitaAcentosYCambiaAMayusculas($objStringUtils->reducirEspaciosEnBlanco($post['txtBuscarId']))) : '';

$txtBuscarNombre = isset($post['txtBuscarNombre']) ? 
    $objSeguridad->limpiarCadenaSQL($objStringUtils->quitaAcentosYCambiaAMayusculas($objStringUtils->reducirEspaciosEnBlanco($post['txtBuscarNombre']))) : '';

$selectBuscarStatus = isset($post['selectBuscarStatus']) ? 
    $objSeguridad->limpiarCadenaSQL($objStringUtils->quitaAcentosYCambiaAMayusculas($objStringUtils->reducirEspaciosEnBlanco($post['selectBuscarStatus']))) : '';

if (isset($get['btnBorrar'])) {
    
    $empleadoIdABorrar = $objSeguridad->limpiarCadenaSQL($get['empDltId']);
    
    if (!$objEmpleadosAdmin->deleteEmpleado($empleadoIdABorrar, $messageDeleteEmpleados)) {
        
        echo '<label style="color: red; font-weight: bold;">' . $messageDeleteEmpleados . '</label>' . SALTO . SALTO;
    
    } else {
        
        echo '<label style="color: blue; font-weight: bold;">El Empleado seleccionado se di&oacute; de baja exitosamente</label>' . SALTO . SALTO;
    }
}

if (isset($post['btnBuscar'])) {
    
    if (strcmp($txtBuscarId, '') == 0
        && strcmp($txtBuscarNombre, '') == 0 
        && strcmp($selectBuscarStatus, '') == 0 
        ) 
    {
        echo '<label style="color: red; font-weight: bold;">Debe digitar al menos un criterio de b&uacute;squeda</label>' . SALTO . SALTO;
    } else {
        include_once EMPLEADO_OBJ;
        $objEmpleadoObj = new Empleado();
        
        $objEmpleadoObj->setId($txtBuscarId);
        $objEmpleadoObj->setNombre($txtBuscarNombre);
        
       if(strcmp($selectBuscarStatus, '')!= 0){
           $objEmpleadoObj->setStatus($selectBuscarStatus);
        }
        
        if(!$objEmpleadosAdmin->buscarEmpleados($objEmpleadoObj, $arrayInfoEmpleados, $messageBuscarEmpleado))
        {
            echo '<label style="color: red; font-weight: bold;">'.$messageBuscarEmpleado.'</label>' . SALTO . SALTO;  
        } else {
            $totalDeCoincidencias = count($arrayInfoEmpleados);
            echo '<label style="color: blue; font-weight: bold;"> Se encontraron '.$totalDeCoincidencias.'</label>' . SALTO . SALTO;  
        }
    }
}

?>

<div style="margin-left: 400px">
      <h2 style="color: #0097ff ; font-weight: bold; font-size: 2em;">ADMINISTRAR EMPLEADOS</h2>
      <h4 style="margin-left: 50px">Ingrese al menos un criterio de búsqueda</h4>
</div>

<form action="<?= htmlspecialchars($server["PHP_SELF"]); ?>" method="POST">

    <table border="0" style="margin-left: 500px;">
        <tbody>
            <tr>
                <td>
                    <input type="text" name="txtBuscarId" value="<?= $txtBuscarId; ?>" class="form-field animation" placeholder="ID de Empleado">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="txtBuscarNombre" value="<?= $txtBuscarNombre; ?>" class="form-field animation" placeholder="Nombre de Empleado">
                </td>
            </tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr>
                 <td>
                    <select name="selectBuscarStatus" class="form-field">
                        <option value="">Seleccione Status</option>
                        
                        <?php foreach ($arrayStatus as $keyStatus => $valueStatus): ?>
                        
                            <?php
                            
                            $selectedStatus = strcmp($keyStatus, $selectBuscarStatus) == 0 ? 'selected' : '';
                            
                            ?>
                            <option value="<?= $keyStatus; ?>" <?= $selectedStatus; ?>><?= $valueStatus; ?></option>

                            <?php
                            ?>

                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>&nbsp;</label>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <input class=" formButton form-field" type="submit" name="btnBuscar" value="Buscar" style="margin-left: -200%;" >
                </td>
            </tr>
        </tbody>
    </table>
    
    <input type="hidden" name="accion" value="adminEmpleados">
    
</form>
<br>
<br>
<hr>
<?php if (isset($arrayInfoEmpleados)): ?>
        
    <br>
    <br>

    <table  style="margin-left: 140px;font-family:  Sans-Serif;
    font-size: 15px;  text-align: left;    border-collapse: collapse;" class="tablaAdmin">

        <thead>
            <tr>
                <th style=" font-size: 13px;     font-weight: normal;     padding: 20px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039;">ID</th>
                <th style=" font-size: 13px;     font-weight: normal;     padding: 12px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039;">NOMBRE</th>
                <th style=" font-size: 13px;     font-weight: normal;     padding: 12px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039;">AP. PATERNO</th>
                <th style=" font-size: 13px;     font-weight: normal;     padding: 12px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039;">AP. MATERNO</th>
                <th style=" font-size: 13px;     font-weight: normal;     padding: 12px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039;">SEXO</th>
                <th style=" font-size: 13px;     font-weight: normal;     padding: 12px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039;">ESTADO CIVIL</th>
                <th style=" font-size: 13px;     font-weight: normal;     padding: 12px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039;">FECHA DE NACIMIENTO</th>
                <th style=" font-size: 13px;     font-weight: normal;     padding: 12px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039;">STATUS</th>
                <th style=" font-size: 13px;     font-weight: normal;     padding: 12px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039;">FECHA DE REGISTRO</th>
                <th style=" font-size: 13px;     font-weight: normal;     padding: 12px;     background: #A8E7AE;
    border-top: 4px solid #99E59C;    border-bottom: 1px solid #fff; color: #000;" >EDITAR</th>
                <th style=" font-size: 13px;     font-weight: normal;     padding: 12px;     background: #F1A6A1;
    border-top: 4px solid #E59E99 ;    border-bottom: 1px solid #fff; color: #000;">BORRAR</th>
            </tr>
        </thead>
        <tbody>

                <?php foreach ($arrayInfoEmpleados as $keyEmpleado => $valueEmpleado): ?>

                    <?php
                    $empleadoId = $valueEmpleado['empleadoId'];
                    $empleadoNombre = $valueEmpleado['empleadoNombre'];
                    $empleadoApp = $valueEmpleado['empleadoApp'];
                    $empleadoApm = $valueEmpleado['empleadoApm'];
                    $empleadoSexo = $valueEmpleado['empleadoSexo'];
                    $empleadoEstadoCivil = $valueEmpleado['empleadoEstadoCivil'];
                    $fechaNacimiento = $valueEmpleado['fechaNacimiento'];
                    $empleadoStatus = $valueEmpleado['empleadoStatus'];
                    $empleadoFechaHoraRegistro = $valueEmpleado['empleadoFechaHoraRegistro'];

                    $colorDeRegistro = strcmp($empleadoStatus, '1') == 0 ? 'registro-activo' : 'registro-inactivo';

                    ?>
                        <tr class="<?= $colorDeRegistro; ?>">
                            <td style="padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
                            color: #669;    border-top: 1px solid transparent;">
                                <?= $empleadoId; ?>
                            </td>
                            <td>
                                <?= $empleadoNombre; ?>
                            </td>
                            <td>
                                <?= $empleadoApp; ?>
                            </td>
                            <td>
                                <?= $empleadoApm; ?>
                            </td>
                            <td  style="text-align: center;">
                                <?= $empleadoSexo; ?>
                            </td>
                             <td  style="text-align: center;">
                                <?= $empleadoEstadoCivil; ?>
                            </td>
                            <td>
                                <?= $fechaNacimiento; ?>
                            </td>
                            <td  style="text-align: center;">
                                <?= $empleadoStatus; ?>
                            </td>
                            <td>
                                <?= $empleadoFechaHoraRegistro; ?>
                            </td>
                            <td style="text-align: center;">
                                <a href="<?= htmlspecialchars($server["PHP_SELF"] . '?accion=editEmpleado&empId=' . $empleadoId); ?>">
                                    Editar
                                </a>
                            </td>
                            <td style="text-align: center;">
                                <a href="<?= htmlspecialchars($server["PHP_SELF"] . '?accion=adminEmpleados&btnBorrar=true&empDltId=' . $empleadoId); ?>">
                                    Borrar
                                </a>
                            </td>
                        </tr>

                <?php endforeach; ?>

        </tbody>
    </table>
    <br>
    <br>

<?php endif; ?>

    
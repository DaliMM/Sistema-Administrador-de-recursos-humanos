<?php

include_once EMPLEADOS_ADMIN;
$objEmpleadosAdmin = new EmpleadosAdmin();

include_once EMPLEADO_OBJ;
$objEmpleadoObj = new Empleado();

include_once SEGURIDAD;
$objSeguridad = new Seguridad();

include_once STRING_UTILS;
$objStringUtils = new StringUtils();

$empleadoNombre = '';
$empleadoApp = '';
$empleadoApm = '';
$empleadoSexo = '';
$empleadoEstadoCivil = '';
$fechaNacimiento = '';
$empleadoStatus = '';

echo SALTO;
echo SALTO;

//$objArrayUtils->muestraContenidoDeArrayFormateado($post);

//$empleadoId = 7894;
$empleadoId = isset($get['empId']) ? $get['empId'] : $post['empId'];
    
//var_dump($empleadoId);
//echo SALTO;
//echo SALTO;

if (!$objEmpleadosAdmin->getInfoEmpleado($empleadoId, $arrayInfoEmpleado, $messageGetInfoEmpleado)) {
    
    echo '<label style="color: red; font-weight: bold;">' . $messageGetInfoEmpleado . '</label>' . SALTO . SALTO;
    
} else {
    
    if (isset($arrayInfoEmpleado)) {
        
//        $objArrayUtils->muestraContenidoDeArrayFormateado($arrayInfoEmpleado);
        
        $empleadoNombre = $arrayInfoEmpleado['empleadoNombre'];
        $empleadoApp = $arrayInfoEmpleado['empleadoApp'];
        $empleadoApm = $arrayInfoEmpleado['empleadoApm'];
        $empleadoSexo = $arrayInfoEmpleado['empleadoSexo'];
        $empleadoEstadoCivil = $arrayInfoEmpleado['empleadoEstadoCivil'];
        $fechaNacimiento = $arrayInfoEmpleado['fechaNacimiento'];
        $empleadoStatus = $arrayInfoEmpleado['empleadoStatus'];
        
    } else {
        
        echo '<label style="color: red; font-weight: bold;">El empleado seleccionado no existe en la Base de Datos</label>' . SALTO . SALTO;
    }
}

$txtNombre = isset($post['txtNombre']) ? 
    $objSeguridad->limpiarCadenaSQL($objStringUtils->quitaAcentosYCambiaAMayusculas($objStringUtils->reducirEspaciosEnBlanco($post['txtNombre']))) 
    : $empleadoNombre;

$txtApp = isset($post['txtApp']) ? 
    $objSeguridad->limpiarCadenaSQL($objStringUtils->quitaAcentosYCambiaAMayusculas($objStringUtils->reducirEspaciosEnBlanco($post['txtApp']))) 
    : $empleadoApp;
$txtApm = isset($post['txtApm']) ? 
    $objSeguridad->limpiarCadenaSQL($objStringUtils->quitaAcentosYCambiaAMayusculas($objStringUtils->reducirEspaciosEnBlanco($post['txtApm']))) 
    : $empleadoApm;
$selectSexo = isset($post['selectSexo']) ? 
    $objSeguridad->limpiarCadenaSQL($objStringUtils->quitaAcentosYCambiaAMayusculas($objStringUtils->reducirEspaciosEnBlanco($post['selectSexo']))) 
    : $empleadoSexo;
$selectEstadoCivil = isset($post['selectEstadoCivil']) ? 
    $objSeguridad->limpiarCadenaSQL($objStringUtils->quitaAcentosYCambiaAMayusculas($objStringUtils->reducirEspaciosEnBlanco($post['selectEstadoCivil']))) 
    : $empleadoEstadoCivil;
$dateFechaNacimiento = isset($post['dateFechaNacimiento']) ? 
    $objStringUtils->reducirEspaciosEnBlanco($post['dateFechaNacimiento'])
    : $fechaNacimiento;

if (isset($post['btnActualizar'])) {
    
    if(strcmp($txtNombre, '') == 0){
        
        echo '<label style="color: red; font-weight: bold;">Los campos marcados con * son obligatorios</label>' . SALTO . SALTO;
        
    } else if (!$objStringUtils->validarCaracteres($txtNombre, TIPO_CADENA_STRING)) {
        
        echo '<label style="color: red; font-weight: bold;">El campo Nombre solo debe contener caracteres alfab&eacute;ticos</label>' . SALTO . SALTO;
        
    } else {
        
        $objEmpleadoObj->setId($empleadoId);
        $objEmpleadoObj->setNombre($txtNombre);
        $objEmpleadoObj->setApp($txtApp);
        //yo
        $objEmpleadoObj->setApm($txtApm);
        $objEmpleadoObj->setSexo($selectSexo);
        $objEmpleadoObj->setEstadoCivil($selectEstadoCivil);
        $objEmpleadoObj->setFechaNacimiento($dateFechaNacimiento);
        
        if (!$objEmpleadosAdmin->updateInfoEmpleado($objEmpleadoObj, $messageUpdateInfoEmpleado)) {
            
            echo '<label style="color: red; font-weight: bold;">' . $messageUpdateInfoEmpleado .'</label>' . SALTO . SALTO;
            
        } else {
            echo '<label style="color: blue; font-weight: bold;">La informaci&oacute;n del Empleado se actualiz&oacute; con &eacute;xito</label>' . SALTO . SALTO;
        }
    }
}

?>

<div style="margin-left: 400px">
      <h2 style="color: #0097ff ; font-weight: bold; font-size: 2em;">EDITAR INFORMACIÓN</h2>
</div> 

<form action="<?= htmlspecialchars($server["PHP_SELF"]); ?>" method="POST" style="margin-left: 400px">
    
    <table border="0">
        <tbody>
            <tr>
                <td class="alinear-derecha">
                    <label>ID de Empleado:</label>
                </td>
                <td>
                    <input type="text" name="empId" value="<?= $empleadoId; ?>" readonly class="form-field animation">
                </td>
            </tr>
            <tr>
                <td class="alinear-derecha">
                    <label>* Nombre de Empleado:</label>
                </td>
                <td>
                    <input type="text" name="txtNombre" value="<?= $txtNombre; ?>" style="text-transform: uppercase;" class="form-field animation">
                </td>
            </tr>
            <tr>
                <td class="alinear-derecha">
                    <label>* Apellido paterno:</label>
                </td>
                <td>
                    <input type="text" name="txtApp" value="<?= $txtApp; ?>" style="text-transform: uppercase;" class="form-field animation">
                </td>
            </tr>
            <tr>
                <td class="alinear-derecha">
                    <label>* Apellido materno:</label>
                </td>
                <td>
                    <input type="text" name="txtApm" value="<?= $txtApm; ?>" style="text-transform: uppercase;" class="form-field animation">
                </td>
            </tr>
             <tr>
                <td class="alinear-derecha">
                    <label>* Sexo:</label>
                </td>
                <td>
                    <input type="select" name="selectSexo" value="<?= $selectSexo; ?>" style="text-transform: uppercase;" class="form-field">
                </td>
            </tr>
             <tr>
                <td class="alinear-derecha">
                    <label>* Estado Civil:</label>
                </td>
                <td>
                    <input type="select" name="selectEstadoCivil" value="<?= $selectEstadoCivil; ?>" style="text-transform: uppercase;" class="form-field">
                </td>
            </tr>
            <tr>
                <td class="alinear-derecha">
                    <label>* Fecha Nacimiento:</label>
                </td>
                <td>
                    <input type="date" name="dateFechaNacimiento" value="<?= $dateFechaNacimiento; ?>" style="text-transform: uppercase;" class="form-field">
                </td>
            </tr>
            
      

        </tbody>
    </table>
    
    <br>
    <input type="submit" name="btnActualizar" value="Actualizar" class="formButton"style="margin-left: 130px">
    
    <input type="hidden" name="accion" value="editEmpleado">
    <!--<input type="hidden" name="empId" value="<?php // echo $empleadoId; ?>">-->
    
</form>
<!--
AQUI FORM EDIT AREA-->
    
</form>-->
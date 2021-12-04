<?php

include AREAS_ADMIN;
$objAreasAdmin = new AreasAdmin();

include_once SEGURIDAD;
$objSeguridad = new Seguridad();

include_once STRING_UTILS;
$objStringUtils = new StringUtils();

if(!$objAreasAdmin->getListaDeAreas($arrayListaDeAreas, $messageGetListaDeAreas)) {
    
    echo $messageGetListaDeAreas . SALTO;
}


$hoyMySQL = date('Y-m-d');
// aaaa-mm-dd 

$txtNombre = isset($_POST['txtNombre']) ? 
    $objSeguridad->limpiarCadenaSQL($objStringUtils->quitaAcentosYCambiaAMayusculas($objStringUtils->reducirEspaciosEnBlanco($post['txtNombre']))) : '';
$txtApp = isset($post['txtApp']) ? 
    $objSeguridad->limpiarCadenaSQL($objStringUtils->quitaAcentosYCambiaAMayusculas($objStringUtils->reducirEspaciosEnBlanco($post['txtApp']))) : '';

$txtApm = isset($post['txtApm']) ? 
    $objSeguridad->limpiarCadenaSQL($objStringUtils->quitaAcentosYCambiaAMayusculas($objStringUtils->reducirEspaciosEnBlanco($post['txtApm']))) : '';

$selectSexo = isset($post['selectSexo']) ? $post['selectSexo'] : '';
//$radioSexo = isset($post['radioSexo']) ? $post['radioSexo'] : '';

$selectEstadoCivil = isset($post['selectEstadoCivil']) ? $post['selectEstadoCivil'] : '';

$dateFechaNacimiento = isset($post['dateFechaNacimiento']) ? 
    $objSeguridad->limpiarCadenaSQL($objStringUtils->reducirEspaciosEnBlanco($post['dateFechaNacimiento'], 0)) : $hoyMySQL;

$numberNumeroDeEmpleados = isset($post['numberNumeroDeEmpleados']) ? $post['numberNumeroDeEmpleados'] : '';

$selectArea = isset($_POST['selectArea']) ? $_POST['selectArea'] : '';

if (isset($_POST['btnEnviar'])) {
    
    if(strcmp($txtNombre, '') == 0
        ||strcmp($txtApp,'') == 0 
        ||strcmp($selectSexo,'') == 0 
        ||strcmp($selectArea,'') == 0
        ||strcmp($selectEstadoCivil,'') == 0
        ||strcmp($dateFechaNacimiento, '') == 0 )
    {  
   
        echo '<label style="color: red; font-weight: bold;">Los campos marcados con * son obligatorios</label>' . SALTO . SALTO;
        
    } else if (!$objStringUtils->validarCaracteres($txtNombre, TIPO_CADENA_STRING)) {
        
        echo '<label style="color: red; font-weight: bold;">El campo Nombre solo debe contener caracteres alfab&eacute;ticos</label>' . SALTO . SALTO;
        
    } else if (!$objStringUtils->validarCaracteres($dateFechaNacimiento, TIPO_CADENA_DATE)) {
        
        echo '<label style="color: red; font-weight: bold;">El campo Fecha de Nacimiento debe cumplir con el formato aaaa-mm-dd</label>' . SALTO . SALTO;
    
    } else if ($dateFechaNacimiento > $hoyMySQL) {
        
        echo '<label style="color: red; font-weight: bold;">La fecha de nacimiento no debe ser mayor al d&iacute;a de HOY</label>' . SALTO . SALTO;
    
    } else {
              
        include_once EMPLEADO_OBJ;
        $objEmpleadoObj = new Empleado();

        include_once EMPLEADOS_ADMIN;
        $objEmpleadosAdmin = new EmpleadosAdmin();

        $objEmpleadoObj->setNombre($txtNombre);
        $objEmpleadoObj->setApp($txtApp);
        $objEmpleadoObj->setApm($txtApm);
        $objEmpleadoObj->setSexo($selectSexo);
        $objEmpleadoObj->setEstadoCivil($selectEstadoCivil);
        $objEmpleadoObj->setFechaNacimiento($dateFechaNacimiento);

        if (!$objEmpleadosAdmin->insertEmpleado($objEmpleadoObj, $empleadoIdInsertado, $messageInsertEmpleado)) {

            echo $messageInsertEmpleado . SALTO;

        } else {
            
               $objEmpleadosAdmin->insertAreaDeEmpleado($empleadoIdInsertado, $selectArea, $areaEmpleadoIdGenerado, $messageInsertAreaDeEmpleado);
               
               echo 'El empleado se registr&oacute; con &eacute;xito.' . SALTO . 'ID asignado: ' . $empleadoIdInsertado . SALTO . SALTO; 
        }
    }

}

?>

<div class="container">
    <div class="header">
      <h2>AGREGAR EMPLEADOS</h2>
      <h4>Los siguientes datos son obligatorios para realizar el registro.</h4>
    </div>
    
    <br>
    <form action="<?= htmlspecialchars($server["PHP_SELF"]); ?>" method="POST" id="formInsert">
        <div class="form left">
            <legend>Información personal</legend>
            <input type="text" name="txtNombre" value="<?= $txtNombre; ?>" class="form-field animation" placeholder="Nombre">
            <br>
            <input type="text" name="txtApp" value="<?= $txtApp; ?>" class="form-field animation" placeholder="Apellido Paterno">
            <br>
            <input type="text" name="txtApm" value="<?= $txtApm; ?>" class="form-field animation" placeholder="Apellido Materno">
            <br>
            <select name="selectSexo" class="form-field animation">

                <option value="">Seleccione Sexo</option>
                <option value="M">Mujer</option>
                <option value="H">Hombre</option>

            </select>
            <br>
            <select name="selectEstadoCivil" class="form-field animation">
                <option value="" >Seleccione estado civil</option>
                <option value="S">Soltero</option>
                <option value="C">Casado</option>
                <option value="D">Divorciado</option>
                <option value="V">Viudo</option>
                <option value="U">Uni&oacute;n libre</option>
            </select>         
            <br>
            <label>Fecha de Nacimiento:</label> <input type="date" name="dateFechaNacimiento" min="1900-01-01" max="<?= $hoyMySQL; ?>" value="<?= $dateFechaNacimiento; ?>" class="form-field animation">
            <br>
        </div>

        <div class="left">
            <legend>Información laboral</legend>
            <br>
            <?php if (isset($arrayListaDeAreas)) : ?>

                 <select name="selectArea" required value="" class="form-field animation">
                     <option>Seleccione su area</option >
                <?php foreach ($arrayListaDeAreas as $keyArea => $valueArea) : ?>
                    <?php
                    $areaId = $valueArea['areaId'];
                    $areaNombre = $valueArea['areaNombre'];
                     ?>
                     <option  value="<?= $areaId; ?>"> <?= $areaNombre; ?> </option>
                <?php endforeach; ?>
                 </select>
            <?php endif; ?>
            <br>
            <br>
        <input type="submit"  name="btnEnviar" value="Enviar" class="animation formButton right">

        <input type="hidden" name="accion" value="insertEmpleado" class="animation formButton">
     </div>
        <br>
</form>
  </div>
   <br>
   <br>
   <br>
   <br>
    
</div>
    <br>
    <br>
    <br>
    <br>
    

<?php

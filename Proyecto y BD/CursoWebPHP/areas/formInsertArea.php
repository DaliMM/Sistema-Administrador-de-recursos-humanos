<?php
$txtNombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : '';
$selecUbicacion = isset($_POST['selecUbicacion']) ? $_POST['selecUbicacion'] : '';
$txtPresupuesto = isset($_POST['txtPresupuesto']) ? $_POST['txtPresupuesto'] : '';

if (isset($_POST['btnEnviar'])) {
    
    include_once AREA_OBJ;
    $objAreaObj = new Area();
    include_once AREAS_ADMIN;
    $objAreasAdmin = new AreasAdmin();
    
    $objAreaObj -> setNombre($txtNombre);
    $objAreaObj ->setUbicacion($selecUbicacion);
    $objAreaObj ->setPresupuesto($txtPresupuesto);
    
    if (!$objAreasAdmin->insertArea($objAreaObj, $areaIdInsertado, $messageInsertArea)) {
        
        echo $messageInsertArea . SALTO;
        
    } else {
        
        echo 'El area se registr&oacute; con &eacute;xito.' . SALTO . 'ID asignado: ' . $areaIdInsertado . SALTO . SALTO;
    }
}

?>
<div style="margin-left: 500px">
      <h2 style="color: #0097ff ; font-weight: bold; font-size: 2em;">AGREGAR ÁREA</h2>
</div> 

<form action="<?= htmlspecialchars($server["PHP_SELF"]); ?>" method="POST" id="formInsert" style="margin-left: 500px;">
    
    <label>Nombre:</label> <input type="text" name="txtNombre" value="<?= $txtNombre; ?>" required class="form-field animation">
    <br>
    <br>
    <label>Presupuesto: </label> <input type="text" name="txtPresupuesto" value="<?= $txtPresupuesto; ?>" required class="form-field animation">
    <br>
    <br>
    <label class="etiquetasParaFormulario">Ubicacion:  </label>
    <select name="selecUbicacion" class="form-field">
        <option value="P1">Primer piso</option>
        <option value="P2">Segundo piso</option>
        <option value="P3">Tercer piso</option>
        <option value="P4">Cuarto piso</option>
        <option value="P5">Quinto piso</option>
        
    </select>
    <br>
    <br>
    <input style="margin-left: 100px;"type="submit" value="Enviar" name="btnEnviar" class="formButton">
    
    <input type="hidden" name="accion" value="insertArea">
    
    <br>
     <br>
      <br>
  <!--    
     AQUI FORM ADMIN AREA-->
<?php
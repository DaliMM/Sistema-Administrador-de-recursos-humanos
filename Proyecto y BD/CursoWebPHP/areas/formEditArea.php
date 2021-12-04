<?php
?>

<div style="margin-left: 400px">
      <h2 style="color: #0097ff ; font-weight: bold; font-size: 2em;">EDITAR ÁREA</h2>
</div> 

<form action="<?= htmlspecialchars($server["PHP_SELF"]); ?>" method="POST" style="margin-left: 400px">
    
    <table border="0">
        <tbody>
            <tr>
                <td class="alinear-derecha">
                    <label>ID de Área</label>
                </td>
                <td>
                    <input type="text" name="empId" value="1" readonly class="form-field animation">
                </td>
            </tr>
            <tr>
                <td class="alinear-derecha">
                    <label>Nombre de Área</label>
                </td>
                <td>
                    <input type="text" name="txtNombre" value="TECNOLOGÍAS" style="text-transform: uppercase;" class="form-field animation">
                </td>
            </tr>
            <tr>
                <td class="alinear-derecha">
                    <label>Presupuesto</label>
                </td>
                <td>
                    <input type="text" name="txtApp" value=" $ 25 000" style="text-transform: uppercase;" class="form-field animation">
                </td>
            </tr>
            <tr>
                <td class="alinear-derecha">
                    <label>Ubicación</label>
                </td>
                <td>
                    <select name="selecUbicacion" class="form-field">
                        <option value="P4">Cuarto piso</option>
                        <option value="P5">Quinto piso</option>
                    </select>
                  <td>
            </tr>
             
        </tbody>
    </table>
    
    <br>
    <input type="submit" name="btnActualizar" value="Actualizar" class="formButton"style="margin-left: 130px">
    
    <input type="hidden" name="accion" value="editEmpleado">
    <!--<input type="hidden" name="empId" value="<?php // echo $empleadoId; ?>">
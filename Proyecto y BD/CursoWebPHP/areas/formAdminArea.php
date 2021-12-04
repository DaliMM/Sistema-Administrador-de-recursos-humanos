<?php
?>
<div style="margin-left: 20px">
      <h2 style="color: #0097ff ; font-weight: bold; font-size: 2em;">ADMINISTRAR ÁREAS</h2>
    </div> 
      <br>
      <br>
    <table  style="margin-left: -150px;font-family:  Sans-Serif;
    font-size: 15px;  text-align: left;    border-collapse: collapse;" class="tablaAdmin">

        <thead>
            <tr>
                <th style=" font-size: 13px;     font-weight: normal;     padding: 20px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039;">ID</th>
                <th style=" font-size: 13px;     font-weight: normal;     padding: 12px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039;">ÁREA</th>
                <th style=" font-size: 13px;     font-weight: normal;     padding: 12px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039;">PRESUPUESTO</th>
                <th style=" font-size: 13px;     font-weight: normal;     padding: 12px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039;">UBICACIÓN</th>
                <th style=" font-size: 13px;     font-weight: normal;     padding: 12px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039;">N EMPLEADOS</th> 
                <th style=" font-size: 13px;     font-weight: normal;     padding: 12px;     background: #A8E7AE;
    border-top: 4px solid #99E59C;    border-bottom: 1px solid #fff; color: #000;" >EDITAR</th>
                <th style=" font-size: 13px;     font-weight: normal;     padding: 12px;     background: #F1A6A1;
    border-top: 4px solid #E59E99 ;    border-bottom: 1px solid #fff; color: #000;">BORRAR</th>
            </tr>
        </thead>

        <tbody>
                <tr>
                            <td style="padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
                            color: #669;    border-top: 1px solid transparent;">
                                1
                            </td>
                            <td>
                                RECURSOS HUMANOS
                            </td>
                            <td style="text-align: center;">
                                $ 12 000
                            </td>
                            <td>
                               TERCER PISO
                            </td>
                            <td  style="text-align: center;">
                               2
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
                <tr>
                            <td style="padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
                            color: #669;    border-top: 1px solid transparent;">
                                2
                            </td>
                            <td>
                               TECNOLOGIAS
                            </td>
                            <td  style="text-align: center;">
                                $ 25 000
                            </td>
                            <td>
                               CUARTO PISO
                            </td>
                            <td  style="text-align: center;">
                               4
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
                <tr>
                            <td style="padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
                            color: #669;    border-top: 1px solid transparent;">
                                3
                            </td>
                            <td>
                               ADMINISTRACION
                            </td>
                            <td  style="text-align: center;">
                                $ 5 000
                            </td>
                            <td>
                              PRIMER PISO
                            </td>
                            <td  style="text-align: center;">
                               3
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
        </tbody>
    </table>
    
    
</form>
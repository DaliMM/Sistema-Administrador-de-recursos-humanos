<?php

switch ($accion) {

    case 'insertEmpleado':
        include_once EMPLEADOS_FORM_INSERT;
        break;
    case 'adminEmpleados':
        include_once EMPLEADOS_FORM_ADMIN;
        break;
    case 'editEmpleado':
        include_once EMPLEADO_FORM_EDIT;
        break;
    case 'insertEmpresa':
        include_once EMPRESAS_FORM_INSERT;
        break;
    case 'insertArea':
        include_once AREAS_FORM_INSERT;
        break;
    case 'adminArea':
        include_once AREAS_FORM_ADMIN;
        break;
     case 'editArea':
        include_once AREA_FORM_EDIT;
        break;
    default:
        /*AQUI PUEDO PONER EL MENÚ SUPERIOR*/
        break;
}

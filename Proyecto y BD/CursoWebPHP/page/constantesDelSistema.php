<?php

define('SALTO', '<br>');
define('MARCA', '-------------------------------------------------------------------------------------------------------------------------------------------<br>');

define('CONEXION_BD_PATH', 'conexionBD/conexionBD.php');

// ++++++++++++++ PAGE +++++++++++++++++++
define('CONTROL_PAGE', 'page/control.php');
define('HOME_PAGE', 'page/HomePage.php');
define('MENU_PRINCIPAL_PAGE', 'page/menus/menuPrincipal.php');

// ++++++++++++++ CLASES OBJ +++++++++++++++++++
define('EMPLEADO_OBJ', 'clases/Empleado.php');
define('HABILIDAD_OBJ', 'clases/Habilidad.php');
define('PERSONA_OBJ', 'clases/Persona.php');
define('EMPRESA_OBJ', 'clases/Empresa.php');
define('AREA_OBJ', 'clases/Area.php');

// ++++++++++++++ CLASES ADMIN +++++++++++++++++++
define('ARRAY_UTILS', 'clasesAdmin/ArrayUtils.php');
define('HABILIDADES_ADMIN', 'clasesAdmin/HabilidadesAdmin.php');
define('EMPLEADOS_ADMIN', 'clasesAdmin/EmpleadosAdmin.php');
define('EMPRESAS_ADMIN', 'clasesAdmin/EmpresasAdmin.php');
define('AREAS_ADMIN', 'clasesAdmin/AreasAdmin.php');
define('SEGURIDAD', 'clasesAdmin/Seguridad.php');
define('STRING_UTILS', 'clasesAdmin/StringUtils.php');

// ++++++++++++++ EMPLEADOS +++++++++++++++++++
define('EMPLEADO_FORM_EDIT', 'empleados/formEditEmpleado.php');
define('EMPLEADOS_FORM_INSERT', 'empleados/formInsertEmpleado.php');
define('EMPLEADOS_FORM_ADMIN', 'empleados/formAdminEmpleados.php');
define('EMPRESAS_FORM_INSERT', 'empresas/formInsertEmpresa.php');
define('AREAS_FORM_INSERT', 'areas/formInsertArea.php');


define('TIPO_CADENA_STRING', 'STRING');
define('TIPO_CADENA_EMAIL', 'EMAIL');
define('TIPO_CADENA_DATE', 'DATE');
define('TIPO_CADENA_NUMBER', 'NUMBER');
define('TIPO_CADENA_INT_OR_FLOAT', 'INT_FLOAT');
define('TIPO_CADENA_LETRAS_NUMEROS', 'LN');
define('TIPO_CADENA_LETRAS_NUMEROS_SIN_ESPACIOS', 'LNSE');
define('TIPO_CADENA_LETRAS_NUMEROS_PUNTO', 'LNP');
define('TIPO_CADENA_LETRAS_NUMEROS_PUNTO_SIN_ESPACIO', 'LNPSE');

// ++++++++++++++ HOJAS DE ESTILO +++++++++++++++++++
define('STYLE_MENU', 'css/styleMenu');
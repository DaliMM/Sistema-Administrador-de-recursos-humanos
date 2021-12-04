<?php

class EmpleadosAdmin {
    
    private $connPDO;
    
    public function __construct() {
        
        include_once CONEXION_BD_PATH;
        $objConn = new conexionBD();
        $this->connPDO = $objConn->getConexionPDO();
    }
    public function insertEmpleado($objEmpleado, &$empleadoIdInsertado, &$message) {
        
        $message = '';
        
        $nombre = $objEmpleado->getNombre();
        $app = $objEmpleado->getApp();
        $apm = $objEmpleado->getApm();
        $sexo = $objEmpleado->getSexo();
        $estadoCivil = $objEmpleado->getEstadoCivil();
        $fechaNacimiento = $objEmpleado->getFechaNacimiento();
        
        $queryInsertEmpleado = 'INSERT INTO '
                . '`empleado`(`empleado_nombre`, `empleado_app`, `empleado_apm`'
                . ', `empleado_fecha_nacimiento`, `empleado_sexo`, `empleado_estado_civil`) '
                . 'VALUES (:nombre, :app, :apm, :fechaNacimiento, :sexo, :estadoCivil);';
        
        $statement = $this->connPDO->prepare($queryInsertEmpleado);
        
        $statement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $statement->bindParam(':app', $app, PDO::PARAM_STR);
        $statement->bindParam(':apm', $apm, PDO::PARAM_STR);
        $statement->bindParam(':fechaNacimiento', $fechaNacimiento, PDO::PARAM_STR);
        $statement->bindParam(':sexo', $sexo, PDO::PARAM_STR);
        $statement->bindParam(':estadoCivil', $estadoCivil, PDO::PARAM_STR);
        
        if (!$statement) {

            $message .= 'No se logr&oacute; cargar la informaci&oacute;n del Empleado (err SQL)';
            return FALSE;
            
        } else if (!$statement->execute()) {

            $message .= 'No se logr&oacute; guardar la informaci&oacute;n del Empleado (err SQL)';
            return FALSE;
            
        } else {

            $empleadoIdInsertado = $this->connPDO->lastInsertId();
            return TRUE;
        }
    }
    
    public function updateInfoEmpleado($objEmpleado, &$message) {
        
        $message = '';
        $complementoDeQuery = '';
        
        $empleadoId = $objEmpleado->getId();
        
        if (!is_null($objEmpleado->getNombre())) {
            
            $conectorComa = strcmp($complementoDeQuery, '') == 0 ? '' : ', ';
            $complementoDeQuery .= $conectorComa . '`empleado_nombre` = :empleadoNombre ';
        }
        
        if (!is_null($objEmpleado->getApp())) {
            
            $conectorComa = strcmp($complementoDeQuery, '') == 0 ? '' : ', ';
            $complementoDeQuery .= $conectorComa . '`empleado_app` = :empleadoApp ';
        }
        //yo lo agregue
        if (!is_null($objEmpleado->getApm())) {
            
            $conectorComa = strcmp($complementoDeQuery, '') == 0 ? '' : ', ';
            $complementoDeQuery .= $conectorComa . '`empleado_apm` = :empleadoApm ';
        }
        
         if (!is_null($objEmpleado->getSexo())) {
            
            $conectorComa = strcmp($complementoDeQuery, '') == 0 ? '' : ', ';
            $complementoDeQuery .= $conectorComa . '`empleado_sexo` = :empleadoSexo ';
        }
        
         if (!is_null($objEmpleado->getFechaNacimiento())) {
            
            $conectorComa = strcmp($complementoDeQuery, '') == 0 ? '' : ', ';
            $complementoDeQuery .= $conectorComa . '`empleado_fecha_nacimiento` = :empleadoFechaNacimiento ';
        }
        
        if (!is_null($objEmpleado->getEstadoCivil())) {
            
            $conectorComa = strcmp($complementoDeQuery, '') == 0 ? '' : ', ';
            $complementoDeQuery .= $conectorComa . '`empleado_estado_civil` = :empleadoEstadoCivil ';
        }
        
        
        $queryUpdateInfoEmpleado = 'UPDATE `empleado` '
            . 'SET ' . $complementoDeQuery
            . 'WHERE `empleado_id` = :empleadoId;';
        $statement = $this->connPDO->prepare($queryUpdateInfoEmpleado);
        
        $statement->bindParam(':empleadoId', $empleadoId, PDO::PARAM_INT);
        
        if (!is_null($objEmpleado->getNombre())) {
            
            $empleadoNombre = $objEmpleado->getNombre();
            $statement->bindParam(':empleadoNombre', $empleadoNombre, PDO::PARAM_STR);
        }
        
        if (!is_null($objEmpleado->getApp())) {
            
            $empleadoApp = $objEmpleado->getApp();
            $statement->bindParam(':empleadoApp', $empleadoApp, PDO::PARAM_STR);
        }
        //yo lo agregue
        
        if (!is_null($objEmpleado->getApm())) {
            $empleadoApm = $objEmpleado->getApm();
            $statement->bindParam(':empleadoApm', $empleadoApm, PDO::PARAM_STR);
        }
        
        if (!is_null($objEmpleado->getSexo())) {
            
            $empleadoSexo= $objEmpleado->getSexo();
            $statement->bindParam(':empleadoSexo', $empleadoSexo, PDO::PARAM_STR);
        }
        
        if (!is_null($objEmpleado->getFechaNacimiento())) {
            
            $empleadoFechaNacimiento = $objEmpleado->getFechaNacimiento();
            $statement->bindParam(':empleadoFechaNacimiento', $empleadoFechaNacimiento, PDO::PARAM_STR);
        }
        
        if (!is_null($objEmpleado->getEstadoCivil())) {
            
            $empleadoEstadoCivil = $objEmpleado->getEstadoCivil();
            $statement->bindParam(':empleadoEstadoCivil', $empleadoEstadoCivil, PDO::PARAM_STR);
        }
        
        if (!$statement) {

            $message .= 'No se logr&oacute; cargar la informaci&oacute;n del Empleado (err SQL)';
            return FALSE;
            
        } else if (!$statement->execute()) {

            $message .= 'No se logr&oacute; actualizar la informaci&oacute;n del Empleado (err SQL)';
            return FALSE;
            
        } else {

            return TRUE;
        }
    }
    
    
    public function deleteEmpleado($empleadoId, &$message) {
        
        $message = '';
        
        $queryDeleteEmpleado = 'UPDATE `empleado` '
            . 'SET `empleado_status` = "0" '
            . 'WHERE `empleado_id` = :empleadoId;';
        $statement = $this->connPDO->prepare($queryDeleteEmpleado);
        
        $statement->bindParam(':empleadoId', $empleadoId, PDO::PARAM_INT);
        
        if (!$statement) {

            $message .= 'No se logr&oacute; cargar la informaci&oacute;n del Empleado (err SQL)';
            return FALSE;
            
        } else if (!$statement->execute()) {

            $message .= 'No se logr&oacute; actualizar la informaci&oacute;n del Empleado (err SQL)';
            return FALSE;
            
        } else {

            return TRUE;
        }
    }
    
   public function insertHabilidadDeEmpleado($empleadoId, $habilidadId, &$habilidadEmpleadoIdGenerado, &$message) {
        
        $message = '';
        
        $queryInsertEmpleado = 'INSERT INTO `puente_empleado_habilidad`(`empleado_id`, `habilidad_id`) '
            . 'VALUES (:empleadoId, :habilidadId);';
        $statement = $this->connPDO->prepare($queryInsertEmpleado);
        
        $statement->bindParam(':empleadoId', $empleadoId, PDO::PARAM_INT);
        $statement->bindParam(':habilidadId', $habilidadId, PDO::PARAM_INT);
        
        if (!$statement) {

            $message .= 'No se logr&oacute; cargar la informaci&oacute;n de la habilidad del Empleado (err SQL)';
            return FALSE;
            
        } else if (!$statement->execute()) {

            $message .= 'No se logr&oacute; guardar la informaci&oacute;n de la habilidad del Empleado (err SQL)';
            return FALSE;
            
        } else {

            $habilidadEmpleadoIdGenerado = $this->connPDO->lastInsertId();
            return TRUE;
        }
    }
    
    public function insertEmpresaDeEmpleado($empleadoId, $empresaId, &$empresaEmpleadoIdGenerado, &$message) {
        
        $message = '';
    
        $queryInsertEmpleado = 'INSERT INTO `puente_empleado_empresa`(`empleado_id`, `empresa_id`) '
                             . 'VALUES (:empleadoId, :empresaId);';
        $statement = $this->connPDO->prepare($queryInsertEmpleado);
        
        $statement->bindParam(':empleadoId', $empleadoId, PDO::PARAM_INT);
        $statement->bindParam(':empresaId', $empresaId, PDO::PARAM_INT);
        
        if (!$statement) {

            $message .= 'No se logr&oacute; cargar la informaci&oacute;n de la empresa del Empleado (err SQL)';
            return FALSE;
            
        } else if (!$statement->execute()) {

            $message .= 'No se logr&oacute; guardar la informaci&oacute;n de la empresa del Empleado (err SQL)';
            return FALSE;
            
        } else {

            $empresaEmpleadoIdGenerado = $this->connPDO->lastInsertId();
            return TRUE;
        }
    }
    
    
    
    public function insertAreaDeEmpleado($empleadoId, $areaId, &$areaEmpleadoIdGenerado, &$message) {
        
        $message = '';
    
        $queryInsertEmpleado = 'INSERT INTO `puente_empleado_area`(`empleado_id`, `area_id`) '
                             . 'VALUES (:empleadoId, :areaId);';
        $statement = $this->connPDO->prepare($queryInsertEmpleado);
        
        $statement->bindParam(':empleadoId', $empleadoId, PDO::PARAM_INT);
        $statement->bindParam(':areaId', $areaId, PDO::PARAM_INT);
        
        if (!$statement) {

            $message .= 'No se logr&oacute; cargar la informaci&oacute;n del area del Empleado (err SQL)';
            return FALSE;
            
        } else if (!$statement->execute()) {

            $message .= 'No se logr&oacute; guardar la informaci&oacute;n del area del Empleado (err SQL)';
            return FALSE;
            
        } else {

            $areaEmpleadoIdGenerado = $this->connPDO->lastInsertId();
            return TRUE;
        }
    }
    
    public function getInfoEmpleados(&$arrayInfoEmpleados, &$message)
        {
        $message = '';
        
        $queryGetInfoEmpleados = 'SELECT * '
            . 'FROM `empleado` '
//            . 'WHERE `empleado_status` = "1" '
            . 'ORDER BY `empleado_app`;';
        $statement = $this->connPDO->prepare($queryGetInfoEmpleados);
        
        if (!$statement) {

            $message .= 'No se logr&oacute; cargar la informaci&oacute;n de los empleados (err SQL)';
            return FALSE;
            
        } else if (!$statement->execute()) {

            $message .= 'No se logr&oacute; obtener la informaci&oacute;n de los empleados (err SQL)';
            return FALSE;
            
        } else {
            
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                
                $arrayInfoEmpleados[$row['empleado_id']]['empleadoId'] = $row['empleado_id'];
                $arrayInfoEmpleados[$row['empleado_id']]['empleadoNombre'] = $row['empleado_nombre'];
                $arrayInfoEmpleados[$row['empleado_id']]['empleadoApp'] = $row['empleado_app'];
                $arrayInfoEmpleados[$row['empleado_id']]['empleadoApm'] = $row['empleado_apm'];
                $arrayInfoEmpleados[$row['empleado_id']]['fechaNacimiento'] = $row['empleado_fecha_nacimiento'];
                $arrayInfoEmpleados[$row['empleado_id']]['empleadoSexo'] = $row['empleado_sexo'];
                $arrayInfoEmpleados[$row['empleado_id']]['empleadoEstadoCivil'] = $row['empleado_estado_civil'];
                $arrayInfoEmpleados[$row['empleado_id']]['empleadoStatus'] = $row['empleado_status'];
                $arrayInfoEmpleados[$row['empleado_id']]['empleadoFechaHoraRegistro'] = $row['empleado_fecha_hora_registro'];
             }
            
            return TRUE;
        }
    }
    
        public function buscarEmpleados($objEmpleado, &$arrayInfoEmpleados, &$message) {
        
        $message = '';
        
        $empleadoId = $objEmpleado->getId();
        $empleadoNombre = $objEmpleado->getNombre();
        $empleadoStatus = $objEmpleado->getStatus();
     
        $complementoQuery = is_null($empleadoStatus) ? '' : 'AND `empleado_status` = :empleadoStatus ';

        $queryBuscarEmpleados = 'SELECT * FROM `empleado` '
            . 'WHERE `empleado_id` LIKE :empleadoId '
            . 'AND `empleado_nombre` LIKE :empleadoNombre '
            . $complementoQuery
            . 'ORDER BY `empleado_id`, `empleado_app` DESC';
        $statement = $this->connPDO->prepare($queryBuscarEmpleados);
        
        $statement->bindValue(':empleadoId', "%$empleadoId%", PDO::PARAM_STR);
        $statement->bindValue(':empleadoNombre', "%$empleadoNombre%", PDO::PARAM_STR);
   
        if (!is_null($empleadoStatus)) {
            
            $statement->bindParam(':empleadoStatus', $empleadoStatus, PDO::PARAM_STR);
        }
        
        if (!$statement) {

            $message .= 'No se logr&oacute; cargar la informaci&oacute;n de los Empleados (err SQL)';
            return FALSE;
            
        } else if (!$statement->execute()) {

            $message .= 'No se logr&oacute; obtener la informaci&oacute;n de los Empleados (err SQL)';
            return FALSE;
            
        } else {
            
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                
                $arrayInfoEmpleados[$row['empleado_id']]['empleadoId'] = $row['empleado_id'];
                $arrayInfoEmpleados[$row['empleado_id']]['empleadoNombre'] = $row['empleado_nombre'];
                $arrayInfoEmpleados[$row['empleado_id']]['empleadoApp'] = $row['empleado_app'];
                $arrayInfoEmpleados[$row['empleado_id']]['empleadoApm'] = $row['empleado_apm'];
                $arrayInfoEmpleados[$row['empleado_id']]['fechaNacimiento'] = $row['empleado_fecha_nacimiento'];
                $arrayInfoEmpleados[$row['empleado_id']]['empleadoSexo'] = $row['empleado_sexo'];
                $arrayInfoEmpleados[$row['empleado_id']]['empleadoEstadoCivil'] = $row['empleado_estado_civil'];
                $arrayInfoEmpleados[$row['empleado_id']]['empleadoStatus'] = $row['empleado_status'];
                $arrayInfoEmpleados[$row['empleado_id']]['empleadoFechaHoraRegistro'] = $row['empleado_fecha_hora_registro'];
             }
            
            return TRUE;
        }
    }
    
    public function getInfoEmpleado($empleadoId, &$arrayInfoEmpleado, &$message) {
        
        $message = '';

        $queryBuscarInfoEmpleado = 'SELECT * FROM `empleado` '
            . 'WHERE `empleado_id`= :empleadoId '
            . 'LIMIT 1;';
        $statement = $this->connPDO->prepare($queryBuscarInfoEmpleado);
        
        $statement->bindValue(':empleadoId', $empleadoId, PDO::PARAM_INT);
        
        if (!$statement) {

            $message .= 'No se logr&oacute; cargar la informaci&oacute;n del Empleado (err SQL)';
            return FALSE;
            
        } else if (!$statement->execute()) {

            $message .= 'No se logr&oacute; obtener la informaci&oacute;n del Empleado (err SQL)';
            return FALSE;
            
        } else {
            
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { 
                $arrayInfoEmpleado['empleadoId'] = $row['empleado_id'];
                $arrayInfoEmpleado['empleadoNombre'] = $row['empleado_nombre'];
                $arrayInfoEmpleado['empleadoApp'] = $row['empleado_app'];
                $arrayInfoEmpleado['empleadoApm'] = $row['empleado_apm'];
                $arrayInfoEmpleado['fechaNacimiento'] = $row['empleado_fecha_nacimiento'];
                $arrayInfoEmpleado['empleadoSexo'] = $row['empleado_sexo'];
                $arrayInfoEmpleado['empleadoEstadoCivil'] = $row['empleado_estado_civil'];
                $arrayInfoEmpleado['empleadoStatus'] = $row['empleado_status'];
                $arrayInfoEmpleado['empleadoFechaHoraRegistro'] = $row['empleado_fecha_hora_registro'];
             }
            return TRUE;
        }
    }
}

    
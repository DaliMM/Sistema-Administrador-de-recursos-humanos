<?php

class AreasAdmin {
private $connPDO;
    
    public function AreasAdmin() {
        
        include_once CONEXION_BD_PATH;
        $objConn = new conexionBD();
        $this-> connPDO = $objConn-> getConexionPDO();
    }
    
    public function insertArea($objEmpleado, &$areaIdInsertado, &$message) {
        
        $message = '';
        
        $nombre = $objEmpleado -> getNombre();
        $ubicacion = $objEmpleado -> getUbicacion();
        $presupuesto = $objEmpleado -> getPresupuesto();
        
        $queryInsertArea = 'INSERT INTO '
                . '`area`(`area_nombre`, `area_ubicacion`, `area_presupuesto`) '
                . 'VALUES (:nombre, :ubicacion, :presupuesto);';
        $statement = $this->connPDO->prepare($queryInsertArea);
        
        $statement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $statement->bindParam(':ubicacion', $ubicacion, PDO::PARAM_STR);
        $statement->bindParam(':presupuesto', $presupuesto, PDO::PARAM_STR);
        
        if (!$statement) {

            $message .= 'No se logr&oacute; cargar la informaci&oacute;n del Area (err SQL)';
            return FALSE;
            
        } else if (!$statement->execute()) {

            $message .= 'No se logr&oacute; guardar la informaci&oacute;n del Area (err SQL)';
            return FALSE;
            
        } else {

            $areaIdInsertado = $this->connPDO->lastInsertId();
            return TRUE;
        }
    }
    
    public function getListaDeAreas(&$arrayListaDeAreas, &$message) {
        
        $message = '';
        
        $queryGetListaDeAreas = 'SELECT * FROM `area` '
                                 . 'WHERE `area_status` = "1";';
        $statement = $this->connPDO->prepare($queryGetListaDeAreas);
        
        if (!$statement) {

            $message .= 'No se logr&oacute; cargar la informaci&oacute;n de las areas (err SQL)';
            return FALSE;
            
        } else if (!$statement->execute()) {

            $message .= 'No se logr&oacute; guardar la informaci&oacute;n de las areas (err SQL)';
            return FALSE;
            
        } else {
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                
                $arrayListaDeAreas[$row['area_id']]['areaId'] = $row['area_id'];
                $arrayListaDeAreas[$row['area_id']]['areaNombre'] = $row['area_nombre'];
                $arrayListaDeAreas[$row['area_id']]['areaStatus'] = $row['area_status'];
            }

            return TRUE;
        }
        
    }
 
}

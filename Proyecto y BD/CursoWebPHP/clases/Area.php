<?php
class Area {   
    private $id;
    private $nombre;
    private $ubicacion;
    private $presupuesto;
    
    public function getId() {
        return $this-> id;
    }

    public function getNombre() {
        return $this-> nombre;
    }

    public function getUbicacion() {
        return $this-> ubicacion;
    }
    public function getPresupuesto() {
        return $this-> presupuesto;
    }

    public function setId($id) {
        $this-> id = $id;
        return $this;
    }

    public function setNombre($nombre) {
        $this-> nombre = $nombre;
        return $this;
    }

    public function setUbicacion($ubicacion) {
        $this-> ubicacion = $ubicacion;
        return $this;
    }
    public function setPresupuesto($presupuesto) {
        $this-> presupuesto = $presupuesto;
        return $this;
    }
    
}

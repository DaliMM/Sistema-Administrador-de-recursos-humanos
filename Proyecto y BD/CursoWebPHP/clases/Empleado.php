<?php

include_once PERSONA_OBJ;

class Empleado extends Persona{
    public $id;
    
    public function getId() {
        return $this->id;
    }


    public function setId($id) {
        $this->id = $id;
        return $this;
    }

  
}

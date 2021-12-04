<?php

class Persona{
            private $nombre;
            private $app;
            private $apm;
            private $sexo;  
            private $estadoCivil;
            private $fechaNacimiento;
            private $status;

            public function getNombre() {
                return $this->nombre;
            }

            public function getApp() {
                return $this->app;
            }

            public function getApm() {
                return $this->apm;
            }

            public function getSexo() {
                return $this->sexo;
            }

            public function getEstadoCivil() {
                return $this->estadoCivil;
            }

            public function getFechaNacimiento() {
                return $this->fechaNacimiento;
            }

            public function getStatus() {
                return $this->status;
            }

            public function setNombre($nombre) {
                $this->nombre = $nombre;
                return $this;
            }

            public function setApp($app) {
                $this->app = $app;
                return $this;
            }

            public function setApm($apm) {
                $this->apm = $apm;
                return $this;
            }

            public function setSexo($sexo) {
                $this->sexo = $sexo;
                return $this;
            }

            public function setEstadoCivil($estadoCivil) {
                $this->estadoCivil = $estadoCivil;
                return $this;
            }

            public function setFechaNacimiento($fechaNacimiento) {
                $this->fechaNacimiento = $fechaNacimiento;
                return $this;
            }

            public function setStatus($status) {
                $this->status = $status;
                return $this;
            }



      }



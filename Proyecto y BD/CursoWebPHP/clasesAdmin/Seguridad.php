<?php

class Seguridad {

    private $longitudSalt = 5;
	
    function __construct() {
        include_once CONEXION_BD_PATH;
        $objConn = new conexionBD();
        $this-> connPDO = $objConn-> getConexionPDO();
    }

    public function encriptarPassword($password, &$passEncriptado, $modo = "sha1") {

        $salt = substr(uniqid(rand(), true), 0, $this->longitudSalt);

        if (in_array($modo, hash_algos())) {

            $saltYPass = $salt . $password;
            $out = hash($modo, $saltYPass);
            $passEncriptado = $this->longitudSalt . $out . $salt;
            return true;
            
        } else {
            return false;
        }
    }

    public function desencriptarPassword($passwordEncriptado) {

        $arrayHash["longitud"] = substr($passwordEncriptado, 0, 1);
        $arrayHash["passwordHash"] = substr($passwordEncriptado, 1, strlen($passwordEncriptado) - ($arrayHash["longitud"] + 1));
        $arrayHash["salt"] = str_replace($arrayHash["passwordHash"], "", substr($passwordEncriptado, 1));
		
        return $arrayHash;
		
    }
    
    function encryptStrings($string, $key) {
        
        $result = '';
        
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result .= $char;
        }
        return base64_encode($result);
    }
    
    function decryptStrings($string, $key) {
        
        $result = '';
        $string = base64_decode($string);
        
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result .= $char;
        }
        return $result;
    }
    
    public function compararPasswords($passwordEncrypt, $password, &$message) {
        
        $message = '';
        
        if (strcmp($passwordEncrypt, '') == 0 || strcmp($password, '') == 0) {
            
            $message .= 'Las Contrase&ntilde;as a comparar no deben estar vacias';
            return false;
            
        } else {
            
            $resultDehashPasswordEncrypt = $this->desencriptarPassword($passwordEncrypt);

            $salt = $resultDehashPasswordEncrypt["salt"];
            $longitudSalt = $resultDehashPasswordEncrypt["longitud"];

            $saltYPassword = $salt . $password;
            $hashAEvaluar = $longitudSalt . hash("sha1", $saltYPassword) . $salt;

            if (strcmp($hashAEvaluar, $passwordEncrypt) == 0) {

                return true;

            } else {

                $message .= 'Las Contrase&ntilde;as no coinciden';
                return false;
            }
        }
    }
    
    public function randomPassword($longitud = 8) {

        $i = 0;
        $passwordGenerado = "";

        $caracteresValidos = array("B", "b", "C", "c", "D", "d", "F", "f", "G", "g", "H", "h", "J", "j", "K", "k", "L", "M", "m", "N", "n",
            "P", "p", "Q", "q", "R", "r", "S", "s", "T", "t", "V", "v", "W", "w", "X", "x", "Y", "y", "Z", "z", "a", "A", "e", "E", "i", "o", "u", "U"
            , "1", "2", "3", "4", "5", "6", "7", "8", "9"
//            , "_", "-", "#", "@", "$", "&", "/"
//                   , ".", ",", ";", ":" , "_", "-", "[", "]", "{", "}", "!", "¡", "¿", "?", "|", "\\", "#", "@", "$", "%", "&", "/", "(", ")", "=", "*", "+"
        );

        while ($i < $longitud) {

            shuffle($caracteresValidos);
            $caracter = $caracteresValidos [mt_rand(0, (count($caracteresValidos)-1))];

            if (!strstr($passwordGenerado, $caracter)) {
                $passwordGenerado .= $caracter;
                $i++;
            }
        }

        return $passwordGenerado;
    }
    
    public function randomNumeros($longitud = 8) {

        $i = 0;
        $numeroGenerado = "";

        $caracteresValidos = array("1", "2", "3", "4", "5", "6", "7", "8", "9", '0');

        while ($i < $longitud) {

            shuffle($caracteresValidos);
            $caracter = $caracteresValidos [mt_rand(0, (count($caracteresValidos)-1))];

            if (!strstr($numeroGenerado, $caracter)) {
                $numeroGenerado .= $caracter;
                $i++;
            }
        }

        return $numeroGenerado;
    }
    
    public function randomCaptcha(&$captchadGenerado, $longitud = 8) {

        $i = 0;
        $captchadGenerado = "";

        $caracteresValidos = array("B", "b", "C", "c", "D", "d", "F", "f", "G", "g", "H", "h", "J", "j", "K", "k", "L", "M", "m", "N", "n",
            "P", "p", "Q", "q", "R", "r", "S", "s", "T", "t", "V", "v", "W", "w", "X", "x", "Y", "y", "Z", "z", "a", "A", "e", "E", "i", "o", "u", "U"
            , "1", "2", "3", "4", "5", "6", "7", "8", "9"
            , "_", "-", "#", "@", "$", "&", "/"
//                   , ".", ",", ";", ":" , "_", "-", "[", "]", "{", "}", "!", "¡", "¿", "?", "|", "\\", "#", "@", "$", "%", "&", "/", "(", ")", "=", "*", "+"
        );

        while ($i < $longitud) {

            shuffle($caracteresValidos);
            $caracter = $caracteresValidos [mt_rand(0, (count($caracteresValidos)-1))];

            if (!strstr($captchadGenerado, $caracter)) {
                $captchadGenerado .= $caracter;
                $i++;
            }
        }

        return true;
        
    }
    
    public function verificarPoliticasDelPassword($password, &$errorMessage) {

        switch ($password) {
            
            case (strlen($password) < PASSWORD_MINIMO_CARACTERES):
                $errorMessage = "La contrase&ntilde;a debe tener al menos " . PASSWORD_MINIMO_CARACTERES . " caracteres";
                return false;
                
            case (strlen($password) > PASSWORD_MAXIMO_CARACTERES):
                $errorMessage = "La contrase&ntilde;a no puede tener m&aacute;s de " . PASSWORD_MAXIMO_CARACTERES . " caracteres";
                return false;
                
            case (!preg_match('`[a-z]`', $password)):
                $errorMessage = "La contrase&ntilde;a debe tener al menos una letra min&uacute;scula";
                return false;
                
            case (!preg_match('`[A-Z]`', $password)):
                $errorMessage = "La contrase&ntilde;a debe tener al menos una letra May&uacute;scula";
                return false;
                    
            case (!preg_match('`[0-9]`', $password)):
                $errorMessage = "La contrase&ntilde;a debe tener al menos un caracter num&eacute;rico";
                return false;
                
            case (!preg_match('`[@#$/_*-]`', $password)):
                $errorMessage = "La contrase&ntilde;a debe tener al menos un caracter especial (Caracteres permitidos: @ # $ - / _ *)";
              return false;

            default :
                return true;
        }
        
    }

    public function limpiarCadenaSQL($valor) {
        
        $valor = str_ireplace("SELECT", "", $valor);
        $valor = str_ireplace("COPY", "", $valor);
        $valor = str_ireplace("UPDATE", "", $valor);
        $valor = str_ireplace("DELETE", "", $valor);
        $valor = str_ireplace("DROP", "", $valor);
        $valor = str_ireplace("DUMP", "", $valor);
        $valor = str_ireplace(" OR ", "", $valor);
        $valor = str_ireplace("%", "", $valor);
        $valor = str_ireplace("LIKE", "", $valor);
        $valor = str_ireplace("--", "", $valor);
        $valor = str_ireplace("^", "", $valor);
        $valor = str_ireplace("[", "", $valor);
        $valor = str_ireplace("]", "", $valor);
        $valor = str_ireplace("'", "", $valor);
        $valor = str_ireplace("!", "", $valor);
        $valor = str_ireplace("¡", "", $valor);
        $valor = str_ireplace("?", "", $valor);
        $valor = str_ireplace("=", "", $valor);
        $valor = str_ireplace("&", "", $valor);
        $valor = addslashes($valor);
        $valor = strip_tags($valor);
        return $valor;

    }
    
    function limpiarCadenaSQLParaTextArea($valor) {
        
        $valor = str_ireplace("SELECT", "", $valor);
        $valor = str_ireplace("COPY", "", $valor);
        $valor = str_ireplace("UPDATE", "", $valor);
        $valor = str_ireplace("DELETE", "", $valor);
        $valor = str_ireplace("DROP", "", $valor);
        $valor = str_ireplace("DUMP", "", $valor);
        $valor = str_ireplace(" OR ", "", $valor);
        $valor = str_ireplace("LIKE", "", $valor);
        $valor = str_ireplace("=", "", $valor);
        $valor = addslashes($valor);
        $valor = strip_tags($valor);
        return $valor;

    }

}


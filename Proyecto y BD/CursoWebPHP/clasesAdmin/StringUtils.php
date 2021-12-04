<?php
class StringUtils {
	
    public function armaNombreDeUsuario($nombre = '', $app = '', $apm = '') {

        $nombreCompleto = "";

        if (strcmp(trim($nombre), "") != 0) {
            $nombreCompleto .= $this->charEspecialAMayuscula($nombre);
        }
        if (strcmp(trim($app), "") != 0) {
            $nombreCompleto .= " " . $this->charEspecialAMayuscula($app);
        }
        if (strcmp(trim($apm), "") != 0) {
            $nombreCompleto .= " " . $this->charEspecialAMayuscula($apm);
        }

        return trim($nombreCompleto);
    }

    public function armaNombreDeUsuarioIniciaPorApp($nombre = '', $app = '', $apm = '') {

        $nombreCompleto = "";

        if (strcmp(trim($app), "") != 0) {
            $nombreCompleto .= $this->charEspecialAMayuscula($app);
        }
        if (strcmp(trim($apm), "") != 0) {
            $nombreCompleto .= " " . $this->charEspecialAMayuscula($apm);
        }
        if (strcmp(trim($nombre), "") != 0) {
            $nombreCompleto .= " " . $this->charEspecialAMayuscula($nombre);
        }

        return trim($nombreCompleto);
    }
	
    function charEspecialAMayuscula($string) {

        return strtr(strtoupper($string), array("à" => "À", "è" => "È", "ì" => "Ì", "ò" => "Ò", "ù" => "Ù", "á" => "Á", "é" => "É", "í" => "Í", "ó" => "Ó", "ú" => "Ú", "â" => "Â", "ê" => "Ê", "î" => "Î", "ô" => "Ô", "û" => "Û", "ç" => "Ç", "ñ" => "Ñ"));
    }

    function charEspecialAMinusculas($string) {

        return strtr(strtolower($string), array("À" => "à", "È" => "è", "Ì" => "ì", "Ò" => "ò", "Ù" => "ù", "Á" => "á", "É" => "é", "Í" => "í", "Ó" => "ó", "Ú" => "ú", "Â" => "â", "Ê" => "ê", "Î" => "î", "Ô" => "ô", "Û" => "û", "Ç" => "ç", "Ñ" => "ñ"));
    }
	
    function charEspecialAPipe($string) {

        return strtr($string, array("Ñ" => "|N", "ñ" => "|n"));
    }
    
    function charPipeAEspecial($string) {

        return strtr($string, array("|N" => "Ñ", "|n" => "ñ"));
    }
    
    public function quitaAcentos($string) {
        
        return strtr($string, array("à" => "a", "è" => "e", "ì" => "i", "ò" => "o", "ù" => "u", "á" => "a", "é" => "e", "í" => "i", "ó" => "o", "ú" => "u", "â" => "a", "ê" => "e", "î" => "i", "ô" => "o", "û" => "u", "À" => "A", "È" => "E", "Ì" => "I", "Ò" => "O", "Ù" => "U", "Á" => "A", "É" => "E", "Í" => "I", "Ó" => "O", "Ú" => "U", "Â" => "A", "Ê" => "E", "Î" => "I", "Ô" => "O", "Û" => "U"));
    }
    
    public function quitaAcentosYCambiaAMayusculas($string) {
        
        return strtr(strtoupper($string), array("à" => "A", "è" => "E", "ì" => "I", "ò" => "O", "ù" => "U", "á" => "A", "é" => "E", "í" => "I", "ó" => "O", "ú" => "U", "â" => "A", "ê" => "E", "î" => "I", "ô" => "O", "û" => "U", "ç" => "Ç", "ñ" => "Ñ", "À" => "A", "È" => "E", "Ì" => "I", "Ò" => "O", "Ù" => "U", "Á" => "A", "É" => "E", "Í" => "I", "Ó" => "O", "Ú" => "U", "Â" => "A", "Ê" => "E", "Î" => "I", "Ô" => "O", "Û" => "U", "ä" => "A", "ë" => "E", "ï" => "I", "ö" => "O", "ü" => "U", "Ä" => "A", "Ë" => "E", "Ï" => "I", "Ö" => "O", "Ü" => "U"));
    }
    
    public function quitaAcentosYCambiaAMinusculas($string) {
        
        return strtr($string, array(
            "A" => "a", "E" => "e", "I" => "i", "O" => "o", "U" => "u"
            , "à" => "a", "è" => "e", "ì" => "i", "ò" => "o", "ù" => "u"
            , "á" => "a", "é" => "e", "í" => "i", "ó" => "o", "ú" => "u"
            , "â" => "a", "ê" => "e", "î" => "i", "ô" => "o", "û" => "u"
            , "Ç" => "ç", "Ñ" => "ñ", "À" => "a", "È" => "e", "Ì" => "i"
            , "Ò" => "o", "Ù" => "u", "Á" => "a", "É" => "e", "Í" => "i"
            , "Ó" => "o", "Ú" => "u", "Â" => "a", "Ê" => "e", "Î" => "i"
            , "Ô" => "o", "Û" => "u"
            , "B" => "b", "C" => "c", "D" => "d", "F" => "f", "G" => "g", "H" => "h"
            , "J" => "j", "K" => "k", "L" => "l", "M" => "m", "N" => "n", "P" => "p"
            , "Q" => "q", "R" => "r", "S" => "s", "T" => "t", "V" => "v", "W" => "w"
            , "X" => "x", "Y" => "y", "Z" => "z"
            ));
    }
	
    public function validarCaracteres($cadena, $tipo) {

        $cadena = trim($cadena);

        switch ($tipo) {

            case TIPO_CADENA_STRING:

                $permitidos = '/^[A-Z üÜáéíóúÁÉÍÓÚñÑàèìòùÀÈÌÒÙ]{1,50}$/i';
                if (preg_match($permitidos, $cadena)) {
                    return true;
                } else {
                    return false;
                }
                break;

            case TIPO_CADENA_EMAIL:

                if (filter_var($cadena, FILTER_VALIDATE_EMAIL)) {
                    return true;
                } else {
                    return false;
                }
                break;

            case TIPO_CADENA_DATE:

                if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $cadena)) {
                    return true;
                } else {
                    return false;
                }
                break;

            case TIPO_CADENA_NUMBER:

                if (ctype_digit($cadena)) {
                    return true;
                } else {
                    return false;
                }
                break;
                
            case TIPO_CADENA_INT_OR_FLOAT:
                
                if (is_numeric($cadena)) {
                    return true;
                } else {
                    return false;
                }
                break;
                
            case TIPO_CADENA_LETRAS_NUMEROS:

                $permitidos = '/^[\w\d[:space:]]+$/i';
                if (preg_match($permitidos, $cadena)) {
                    return true;
                } else {
                    return false;
                }
                break;
                
            case TIPO_CADENA_LETRAS_NUMEROS_SIN_ESPACIOS:

                $permitidos = '/^[\w\d]+$/i';
                if (preg_match($permitidos, $cadena)) {
                    return true;
                } else {
                    return false;
                }
                break;
                
            case TIPO_CADENA_LETRAS_NUMEROS_PUNTO:

                $permitidos = '/^[\w\d.]+$/i';
                if (preg_match($permitidos, $cadena)) {
                    return true;
                } else {
                    return false;
                }
                break;
                
            case TIPO_CADENA_LETRAS_NUMEROS_PUNTO_SIN_ESPACIO:

                $permitidos = '/^[\w\d.]+$/i';
                if (preg_match($permitidos, $cadena)) {
                    return true;
                } else {
                    return false;
                }
                break;
                
        }
		
    }
    
    function reducirEspaciosEnBlanco($cadenaDeTexto, $blancos_permitidos = 1) {
        
        if (is_string($cadenaDeTexto)) {
            
            //Si no se indica número de espacios a conservar asigna valor por defecto...
            if (is_null($blancos_permitidos)) {
                
                $blancos_permitidos = 1;
            }

            $cadenaDeTexto = trim($cadenaDeTexto);

            //Si no queremos blancos los quita todos y devuelve el string...
            if ($blancos_permitidos == 0) {
                return str_replace(' ', '', $cadenaDeTexto);

            //Si queremos conservar blancos
            } else {
                //Por defecto se va a conservar un espacio en blanco...
                $blancos = ' ';

                //Si quisiéramos conservar más de un espacio en blanco, p.e. 2...
                $n = (int) $blancos_permitidos;
                if ($n > 1) {
                    for ($i = 1; $i < $n; $i++) {
                        $blancos .= ' ';
                    }
                }

                //Un bucle elimina los espacios sobrantes
                for ($i = 0; $i < 1000; $i++) {
                    
                    if (strpos($cadenaDeTexto, $blancos . ' ')) {
                        $cadenaDeTexto = str_replace($blancos . ' ', $blancos, $cadenaDeTexto);
                    } else {
                        return $cadenaDeTexto;
                    }
                }
            }
        }
    }
    
    function convertirNumeroDecimalARomano ($numeroDecimal, $case = 'U') {
        
        $simbolos = array("I","V","X","L","C","D","M");
        $valores = array ("1","5","10","50","100","500","1000","5000");
        $numeroRomano = '';
        
        if ($numeroDecimal <= 3999) {
            
            while ($numeroDecimal > 0) {
                
                $i = 0;
                
                while ($i < 7) {
                    
                    while ($numeroDecimal >= $valores[$i] && $numeroDecimal<$valores[$i + 1]) {
                        
                        $par = $i % 2;  // paridad...
                        
                        if ($numeroDecimal >= $valores[$i + 1] - $valores[$i - $par]) {
                            
                            $numeroRomano = $numeroRomano . $simbolos[$i - $par] . $simbolos[$i + 1];
                            $numeroDecimal = $numeroDecimal - ($valores[$i + 1] - $valores[$i - $par]);
                            
                        } else {
                            
                            $numeroRomano = $numeroRomano . $simbolos[$i];
                            $numeroDecimal = $numeroDecimal - $valores[$i];
                        }
                    }
                    
                    $i++;
                }
            }
            
            $numeroRomano = (strcasecmp($case, 'L') == 0) ? strtolower ($numeroRomano) : $numeroRomano;
            
        } else {
            
            $numeroRomano = "overflow";
        }
        
        return $numeroRomano;
    }
	
}

<?php

class ArrayUtils {
    
    public function muestraContenidoDeArrayFormateado($arrayView, $totalRegistrosAVisualizar = 0) {
        
        if (is_array($arrayView)) {
            
            if (count($arrayView) == 0) {
                
                echo 'Array sin contenido';
                return false;
                
            } else {
                
                $countRegistros = 1;

                foreach ($arrayView as $key => $value) {

                    if (is_array($value)) {

                        echo '[' . $key . ']' . SALTO;

                        foreach ($value as $key2 => $value2) {

                            if (is_array($value2)) {

                                echo '&emsp;&emsp;[' . $key2 . ']' . SALTO;

                                foreach ($value2 as $key3 => $value3) {

                                    if (is_array($value3)) {

                                        echo '&emsp;&emsp;&emsp;&emsp;[' . $key3 . ']' . SALTO;

                                        foreach ($value3 as $key4 => $value4) {
                                            
                                            if (is_array($value4)) {
                                                
                                                echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;[' . $key4 . ']' . SALTO;
                                                
                                                foreach ($value4 as $key5 => $value5) {
                                                    
                                                    if (is_array($value5)) {
                                                        
                                                        echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;[' . $key5 . ']' . SALTO;
                                                        
                                                        foreach ($value5 as $key6 => $value6) {
                                                            
                                                            echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;[' . $key6 . '] => ' . $value6 . SALTO;
                                                        }
                                                        
                                                    } else {
                                                        
                                                        echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;[' . $key5 . '] => ' . $value5 . SALTO;
                                                    }
                                                    
                                                }
                                                
                                            } else {
                                                
                                                echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;[' . $key4 . '] => ' . $value4 . SALTO;
                                            }
                                        }

                                    } else {

                                        echo '&emsp;&emsp;&emsp;&emsp;[' . $key3 . '] => ' . $value3 . SALTO;
                                    }

                                }

                            } else {

                                echo '&emsp;&emsp;[' . $key2 . '] => ' . $value2 . SALTO;
                            }
                        }
                        
                    } else {

                        echo '[' . $key . '] => ' . $value . SALTO;
                    }
                    
                    if ($totalRegistrosAVisualizar == $countRegistros) {
                        
                        break;
                        
                    } else {
                        
                        $countRegistros++;
                    }
                }
            }
            
        } else {
            
            echo 'No es Array';
            return false;
        }
        
    }
    
}

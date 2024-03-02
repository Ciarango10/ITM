<?php
    //IMPRESION EN PANTALLA
    echo "Programacion orientada a la web con PHP";

    //FUNCIONES Y ESTRUCTURAS DE CONTROL
    function isPrimeNumber($num){
        if($num <= 1){
            return false; 
        }
        else {
            //CICLO FOR 
            for($i=2; $i < $num/2; $i++){
                if($num % $i ==0){
                    return false;
                }
            }
        }
        return true;
    }

    //DECLARACION DE VARIABLES
    $start= 10;
    $end = 30;

    for($i-$start; $i <= $end; $i++) {
        if(isPrimeNumber($i)) {
            echo "<h1>$i es primo</h1><br/>";
        }
    }
?>
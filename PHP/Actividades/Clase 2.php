<?php
    function factorial($num) {
        $resultado = 1;
        for( $i = $num; $i > 0; $i-- ) {
            $resultado *= $i;
        }
        echo "El factorial de $num es: $resultado";
    }
    factorial(5);
?>
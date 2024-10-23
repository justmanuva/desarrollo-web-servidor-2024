<?php
    function potencia($base, $exponente) {
        $resultado = 1;

        for($i = 0; $i < $exponente; $i++) {
          $resultado *= $base;
        }
        return $resultado;
    }
?>
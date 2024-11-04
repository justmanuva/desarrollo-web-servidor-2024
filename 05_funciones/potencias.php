<?php
    function potencia(int $base, int $exponente) : int {
        $resultado = 1;

        for($i = 0; $i < $exponente; $i++) {
          $resultado *= $base;
        }
        return $resultado;
    }
?>
<?php
    function depurar(string $entrada) : string {
        // Para que el usuario no pueda usar etiquetas en los campos Ej: <h1>Hola</h1>
        $salida = htmlspecialchars($entrada);
        // Para quitar los espacios de delante y detrás
        $salida = trim($salida);
        // Quita posibles bugs muy raros como que el usuario introduzca: \n (No está de más ponerla)
        $salida = stripcslashes($salida);
        // Para quitar los múltiples espacios entre variables y demás
        $salida = preg_replace('!\s+!', ' ', $salida);
        return $salida;
    }
?>
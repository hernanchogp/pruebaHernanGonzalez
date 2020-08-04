<?php

class MultifuncionClass {

    public static function clavealeatoria() {
        $listaCaracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lengtLista= strlen($listaCaracteres);
       
        $clave = '';
        for ($i = 0; $i < 8; $i++) {
            $random_caracter = $listaCaracteres[mt_rand(0, $lengtLista - 1)];
            $clave .= $random_caracter;
        }

        return $clave;
    }

}

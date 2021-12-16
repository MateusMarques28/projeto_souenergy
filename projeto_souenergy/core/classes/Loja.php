<?php

namespace core\classes;

use Exception;

class Loja
{
    
    public static function layout($structure, $dados = null)
    {

        if (!is_array($structure)) {
            throw new Exception("Coleção de estruturas inválidas", 1);
        }

        if (!empty($dados) && is_array($dados)) {
            extract($dados);
        }

        foreach ($structure as $str) {
            include("../core/Views/$str.php");
        }
    }
    
}
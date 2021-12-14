<?php

namespace core\controller;

use core\classes\Loja;
use core\models\Usuarios;

class Main{
    public function index(){
        
        Loja::layout([
            'Layout/Header',    
            'Home',
        ]);
    }

    public function login(){
        Loja::layout([  
            'Layout/Header',
            'login',
        ]);
    }

    public function cadastro(){
        Loja::layout([  
            'Layout/Header',
            'Cadastro_Usuario',
        ]);
    }

    public function cadastro_usuario(){
        $us = new Usuarios;
        $us->registrar_usuarios();
        
        Loja::layout([  
            'Layout/Header',
            'Cadastro_Usuario',
        ]);
    }
}
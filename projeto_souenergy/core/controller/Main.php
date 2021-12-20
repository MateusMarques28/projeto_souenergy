<?php

namespace core\controller;

use core\classes\Loja;
use core\models\Insert\Usuarios;

class Main
{
    public function index()
    {

        Loja::layout([
            'Layout/Header',
            'Home',
        ]);
    }

    public function login()
    {
        Loja::layout([
            'Layout/Header',
            'login',
        ]);
    }

    public function cadastro()
    {
        Loja::layout([
            'Layout/Header',
            'Cadastro_Usuario',
        ]);
    }

    public function cadastro_usuario()
    {

        $us = new Usuarios;
        $us->registrar_usuarios();

        Loja::layout([
            'Layout/Header',
            'Cadastro_Usuario',
        ]);
    }

    public function tabela()
    {
        Loja::layout([
            'Usuario_Logado',
        ]);
    }

    public function editar()
    {
        Loja::layout([
            'Dados_Atualizados',
        ]);

        $ed = new Usuarios();
        $ed -> editar();
    }

    public function delete(){

        Loja::layout([
            'Dados_Deletados',
        ]);
        
        $del = new Usuarios();
        $del -> delete();
    }

    public function delet(){

        Loja::layout([
            'Layout/Header',
            'Delet',
        ]);

    }

    public function verifica_usuario()
    {

        $e = $_POST['email'];
        $s = $_POST['senha'];

        $us = new Usuarios;
        $us->logar_usuario($e, $s);
    }

    public function edit()
    {
        Loja::layout([
            'Layout/Header',
            'Editar',
        ]);
        
    }
}

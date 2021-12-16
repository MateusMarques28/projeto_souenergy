<?php

namespace core\models;

use core\classes\Loja;
use core\classes\Conec;
use Exception;

class Usuarios
{

    public function registrar_usuarios()
    {
        try {

            $bd = new Conec();

            $params = [
                ':nome' => (trim($_POST['nome_completo'])),
                ':cidade' => (trim($_POST['text_cidade'])),
                ':uf' => (trim($_POST['text_uf'])),
            ];

            $bd->insert("INSERT INTO usuarios VALUES (
            0,
            :nome,
            :cidade,
            :uf
            )
            ", $params);



            $parames = [

                ':cpf' => (trim($_POST['text_cpf'])),
                ':email' => strtolower(trim($_POST['text_email'])),
                ':telefone' => (trim($_POST['text_telefone'])),
                ':senha' => (trim($_POST['text_senha_1'])),

            ];

            $bd->insert("INSERT INTO dados_pessoais VALUES (
                0,
                :cpf,
                :email,
                :telefone,
                :senha
                )
                ", $parames);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function logar_usuario($e, $s)
    {

        $parames = [
            ':email' => $e,
            ':senha' => $s
        ];


        $bd = new Conec();
        $results = $bd->select("SELECT * FROM dados_pessoais WHERE email = :email AND senha = :senha", $parames);

        if (count($results) != 1) {

            echo "Usuário não cadastrado!";
            return false;
        } else {

            header('location:/tabela');
            return true;
        }
    }
}

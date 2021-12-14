<?php

namespace core\models;

use core\classes\Conec;
use Exception;

class Usuarios
{
    //==========================================================

    public function registrar_usuarios()
    {
        try {
            //registra o novo cliente no banco de dados
            $Db = new Conec();

            //cria uma hash pro registro do cliente
            //parametros
            $params = [
                ':cpf' => (trim($_POST['text_cpf'])),
                ':nome' => (trim($_POST['nome_completo'])),
                ':email' => strtolower(trim($_POST['text_email'])),
                ':senha' => password_hash(trim($_POST['text_senha_1']), PASSWORD_DEFAULT),
                ':cidade' => (trim($_POST['text_cidade'])),
                ':uf' => (trim($_POST['text_uf'])),
                //':pais' => (trim($_POST['text_país'])),
            ];

            $Db->insert("INSERT INTO usuarios VALUES (0,
            :cpf,
            :nome,
            :email,
            :senha,
            :cidade,
            :uf,
            )
            ", $params);

            //retorna o purl criado
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}



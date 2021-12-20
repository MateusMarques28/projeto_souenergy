<?php

namespace core\models\Insert;

use core\models\Db\Conec;
use Exception;

class dados_pessoais
{

    public function dados_sensiveis()
    {

        try {

            $bd = new Conec();

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
}

<?php

namespace core\classes;

use Exception;
use PDO;
use PDOException;

/* Gestão de base de dados*/

class Conec
{

    private $ligacao;
    //================================================================================
    private function ligar()
    {
        //Ligação com a base de dados
        $this->ligacao = new PDO(
            'mysql:' .
                'host=' . MYSQL_SERVER . ';' .
                'dbname=' . MYSQL_DATABSE . ';',
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );
        // 'charset=' . MYSQL_CHARSET
        //Atributo que mantém a ligação do servidor com a base de dados
        // 

        //Debug
        $this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    private function desligar()
    {
        //Encerra a conexão com a base de dados 
        $this->ligacao = null;
    }

    //===============================================================
    //CRUD
    //===============================================================

    //Verfica se é uma instrução insert
    public function insert($sql, $parametros = null)
    {
        if (!preg_match("/^INSERT/i", $sql)) {
            throw new Exception("Base de dados - Não é uma instrução em insert", 1);
            //die("Base de dados - Não é uma instrução em select");
        }

        //Liga
        $this->ligar();

        $resultados = null;

        try {
            //Comunicação com o banco
            if (!empty($parametros)) {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {
            //Caso exista erros
            return false;
        }

        //Encerra a conexão com o banco de dados
        $this->desligar();

        //Retorna os resultados obtidos
        return $resultados;
    }
   
}
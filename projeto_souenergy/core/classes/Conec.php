<?php

namespace core\classes;

use core\models\Usuarios;
use Exception;
use PDO;
use PDOException;

/* Gestão de base de dados*/

class Conec
{

    private $ligacao;

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

    }
    private function desligar()
    {
        //Encerra a conexão com a base de dados 
        $this->ligacao = null;
    }

    public function select($sql, $parametros = null)
    {
        $sql = trim($sql);
        //Verifica se a expressão é um select
        if (!preg_match("/^SELECT/i", $sql)) {
            throw new Exception("Base de dados - Não é uma instrução em select", 1);
        }

        //Liga
        $this->ligar();
        $resultados = null;


        //Comunica
        try {
            //Comunicação com o banco
            if (!empty($parametros)) {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
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

    public function insert($sql, $parametros = null)
    {
        if (!preg_match("/^INSERT/i", $sql)) {
            throw new Exception("Base de dados - Não é uma instrução em insert", 1);

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

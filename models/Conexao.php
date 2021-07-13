<?php

class Conexao
{
    private static $conexao;

    private function __construct()
    {}

    public static function getInstance()
    {
        if (is_null(self::$conexao)) {
            //self::$conexao = new \PDO('mysql:host=localhost;port=3306;dbname=agenda_contatos', 'root', '');
            self::$conexao = new \PDO('mysql:host=db-dio-bootcamp.cgtbl7plyhbz.us-east-2.rds.amazonaws.com;port=3306;dbname=agenda_contatos', 'admin', 'leao1798');
            self::$conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$conexao->exec('set names utf8');
        }
        return self::$conexao;
    }
}
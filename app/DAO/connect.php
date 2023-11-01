<?php

class connect
{
    private $connection;

    public function __construct()
    {
        define("HOST", "mvcphp.mysql.uhserver.com");
        define("DATABASENAME", "mvcphp");
        define("USER", "affonso");
        define("PASSWORD", "Ma1832ma@");

        try {
            $this->connection = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASENAME, USER, PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error: Não foi possível estabelecer a conexão com o banco de dados. Detalhes do erro: ' . $e->getMessage();
            die();
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}

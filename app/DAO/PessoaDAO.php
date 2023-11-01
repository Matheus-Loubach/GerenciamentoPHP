<?php

include 'connect.php';


class PessoaDAO
{
    private $connection;

    public function __construct()
    {
        // Instanciar a classe Database para obter a conexão
        $database = new connect();
        $this->connection = $database->getConnection();
    }
    
    // Método POST
    public function insert(ClientModel $model)
    {
        try {
            // Define o SQL de inserção
            $sql = "INSERT INTO clients (name, email, phone, sex, city) VALUES (?,?,?,?,?)";
            $stmt = $this->connection->prepare($sql);


            $stmt->bindValue(1, $model->name);
            $stmt->bindValue(2, $model->email);
            $stmt->bindValue(3, $model->phone);
            $stmt->bindValue(4, $model->sex);
            $stmt->bindValue(5, $model->city);

            // Executa a inserção no banco de dados
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error' . $e->getMessage();
            die();
        }
    }

    // Método PUT
    public function update(ClientModel $model)
    {
        $sql = "UPDATE clients SET name=?, email=?, phone=?, sex=?, city=? WHERE id=? ";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $model->name);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->phone);
        $stmt->bindValue(4, $model->sex);
        $stmt->bindValue(5, $model->city);
        $stmt->bindValue(6, $model->id);
        $stmt->execute();
    }


    // Método GET
    public function select()
    {

        $sql = "SELECT * from clients";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        // Retorna todas as linhas resultantes
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    // Pegar a id do usuario 
    public function selectById(int $id)
    {
        include_once "./app/Models/ClientModel.php";

        $sql = "SELECT * from clients WHERE id = ?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("ClientModel");
    }


    //Método DELETE
    public function delete(int $id)
    {
        $sql = "DELETE FROM clients WHERE id = ? ";

        $resultSQl = $this->connection->prepare($sql);
        $resultSQl->bindValue(1, $id);
        $resultSQl->execute();
    }
}

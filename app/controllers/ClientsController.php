<?php

class ClientsController
{
    // Método para exibir a lista de clientes(GET)
    public static function index()
    {

        include './app/Models/ClientModel.php';
        $model = new ClientModel();

        // Obtém a lista de clientes
        $model->getALList();

        // Inclui o arquivo que exibe a lista de clientes na interface do usuário
        include './app/views/ListarPessoa.php';
    }

    // Método para exibir o formulário de adição de clientes
    public static function form()
    {
        include './app/Models/ClientModel.php';
        $model = new ClientModel();


        if (isset($_GET['id']))
            $model = $model->getById((int) $_GET['id']);

        include './app/views/FormPessoa.php';
    }

    public static function pageUpdate()
    {
        include './app/Models/ClientModel.php';
        $model = new ClientModel();

        if (isset($_GET['id']))
            $model = $model->getById((int) $_GET['id']);

        include './app/views/UpdatePessoa.php';
    }

    // Método para processar o envio do formulário (POST)
    public static function save()
    {

        include './app/Models/ClientModel.php';

        $model = new ClientModel();

        // Recupera os dados do cliente enviados através do formulário
        $model->id = $_POST['id'];
        $model->name =  $_POST['name'];
        $model->email = $_POST['email'];
        $model->phone = $_POST['phone'];
        $model->sex = $_POST['sex'];
        $model->city = $_POST['city'];

        $model->save();

        // Redireciona para a listagem de clientes após o salvamento
        header("Location: /list");
    }

    public static function delete()
    {
        include './app/Models/ClientModel.php';

        $model = new ClientModel();

        $model->delete((int) $_GET['id']);

        header("Location: /list");
    }
}

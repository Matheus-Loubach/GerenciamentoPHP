<?php

// Inclui o controlador de clientes (ClientsController)
include './app/controllers/ClientsController.php';

// Analisa a URL da requisição
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


switch ($url) {

    case '/':
        ClientsController::form(); // exibir o formulário
        break;
    case '/list':
        ClientsController::index(); // listar clientes
        break;
    case '/form/update':
        ClientsController::pageUpdate(); // exibir o formulário para atualizar cadastro
        break;
    case '/form/save':
        ClientsController::save(); // Rota para salvar um novo cliente
        break;
    case '/form/delete';
        ClientsController::delete(); // deletar cadastro
        break;
    default:
        echo "Error 404"; // Rota padrão para páginas não encontradas (Erro 404)
        break;
}

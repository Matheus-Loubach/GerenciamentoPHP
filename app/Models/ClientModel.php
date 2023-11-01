<?php

class ClientModel
{
    // Propriedades públicas para armazenar os dados do cliente
    public $id, $name, $email, $phone, $sex, $city;

    public $rows; //Armazenar as linhas resultantes de consultas


    // Este método é chamado quando o formulário é enviado
    public function save()
    {
        include './app/DAO/PessoaDAO.php';

        // Conecta-se ao banco de dados 
        $dao = new PessoaDAO();

        //se id for 0 é post
        if (empty($this->id)) {            // Passa os dados do objeto atual (this) para o método insert do DAO para salvar o cliente
            $dao->insert($this);
            // se não é update
        } else {
            $dao->update($this);
        }
    }


    // Este método é chamado quando a listagem de clientes é necessária
    public function getALList()
    {
        include './app/DAO/PessoaDAO.php';

        // Conecta-se ao banco de dados 
        $dao = new PessoaDAO();

        // Chama o método select do DAO para obter a lista de clientes e armazena o resultado na propriedade $rows
        $this->rows = $dao->select();
    }

    //Retorna a pessoa pelo id
    public function getById(int $id)
    {
        include './app/DAO/PessoaDAO.php';

        $dao = new PessoaDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new ClientModel(); // Operador Ternário

    }

    public function delete(int $id){
        include './app/DAO/PessoaDAO.php';

        $dao = new PessoaDAO();

        $dao->delete($id);
    }
}

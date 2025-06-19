<?php
require_once(__DIR__ . "/banco.php"); 

class CadastroController {
    private $banco;

    public function __construct(){
        $this->banco = new Banco(); 
        $this->cadastrar();         
    }

    private function cadastrar(){
        $this->banco->setCadastro(
            $_POST['nome'],
            $_POST['data_nascimento'],
            $_POST['sexo'],
            $_POST['cpf'],
            $_POST['email'],
            $_POST['telefone'],
            $_POST['cep'],
            $_POST['logradouro'],
            $_POST['bairro'],
            $_POST['cidade'],
            $_POST['uf']
        );

        header("Location: ../Login/cadastro.php");
        exit();
    }
}

new CadastroController();
?>

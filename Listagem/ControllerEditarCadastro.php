<?php
require_once("../Controladores/banco.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);

    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];

    $banco = new Banco();
    $banco->updateCadastro(
        $id, $nome, $data_nascimento, $sexo, $cpf, $email,
        $telefone, $cep, $logradouro, $bairro, $cidade, $uf
    );

    header("Location: index.php");
    exit();
}

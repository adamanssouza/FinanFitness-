<?php 
    include_once('conexao_cadastro.php');

    $nome = $_POST['nome'];
    $data = $_POST['dtnasc'];
    $sexo = $_POST['sexo'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];

    $cpf = preg_replace('/\D/', '', $cpf);



    $sql = "INSERT INTO usuario (nome, sexo, telefone, endereco, cpf, email, data) 
            VALUES ('{$nome}', '{$sexo}', '{$telefone}', '{$endereco}', '{$cpf}', '{$email}', '{$data}')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cadastro efetuado com sucesso!'); location.href='cadastro.html';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar: {$conn->error}');</script>";
    }

    $conn->close();
?>

<?php
require_once("../Controladores/banco.php");

if (!isset($_GET['id'])) {
    echo "<script>alert('ID não informado!'); history.back();</script>";
    exit;
}

$id = intval($_GET['id']);
$banco = new Banco();
$cadastro = $banco->getCadastroById($id);

if (!$cadastro) {
    echo "<script>alert('Cadastro não encontrado!'); history.back();</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            padding: 40px;
            text-align: center;
        }

        .detalhes {
            display: inline-block;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            text-align: left;
            max-width: 500px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        p {
            font-size: 1.05rem;
            margin: 10px 0;
            color: #555;
        }

        .voltar {
            display: inline-block;
            margin-top: 20px;
            background-color: #2563eb;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .voltar:hover {
            background-color: #1e40af;
        }
    </style>
</head>
<body>

<div class="detalhes">
    <h2>Detalhes do Cadastro</h2>
    <p><strong>Nome:</strong> <?= htmlspecialchars($cadastro['nome']) ?></p>
    <p><strong>Data de Nascimento:</strong> <?= htmlspecialchars($cadastro['data_nascimento']) ?></p>
    <p><strong>Sexo:</strong> <?= htmlspecialchars($cadastro['sexo']) ?></p>
    <p><strong>CPF:</strong> <?= htmlspecialchars($cadastro['cpf']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($cadastro['email']) ?></p>
    <p><strong>Telefone:</strong> <?= htmlspecialchars($cadastro['telefone']) ?></p>
    <p><strong>CEP:</strong> <?= htmlspecialchars($cadastro['cep']) ?></p>
    <p><strong>Logradouro:</strong> <?= htmlspecialchars($cadastro['logradouro']) ?></p>
    <p><strong>Bairro:</strong> <?= htmlspecialchars($cadastro['bairro']) ?></p>
    <p><strong>Cidade:</strong> <?= htmlspecialchars($cadastro['cidade']) ?></p>
    <p><strong>UF:</strong> <?= htmlspecialchars($cadastro['uf']) ?></p>

    <a href="index.php" class="voltar">← Voltar para Lista</a>
</div>

</body>
</html>

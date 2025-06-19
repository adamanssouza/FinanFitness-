<?php
require_once("../Controladores/banco.php");

if (!isset($_GET['id'])) {
    echo "<script>alert('ID não informado!');history.back();</script>";
    exit;
}

$id = intval($_GET['id']);
$banco = new Banco();
$cadastro = $banco->getCadastroById($id);

if (!$cadastro) {
    echo "<script>alert('Cadastro não encontrado!');history.back();</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cadastro</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e2e8f0, #f8fafc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        form {
            background: white;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
            color: #1e293b;
            font-size: 1.6rem;
        }

        input, select {
            padding: 10px 12px;
            border: 1.8px solid #cbd5e1;
            border-radius: 8px;
            font-size: 1rem;
            color: #334155;
        }

        button {
            padding: 12px;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        button[type="submit"] {
            background-color: #2563eb;
            color: white;
        }

        button[type="button"] {
            background-color: #94a3b8;
            color: white;
        }

        button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<form method="post" action="ControllerEditarCadastro.php">
    <h2>Editar Cadastro</h2>
    <input type="hidden" name="id" value="<?= $cadastro['id'] ?>">

    <input type="text" name="nome" value="<?= $cadastro['nome'] ?>" required placeholder="Nome completo">
    <input type="date" name="data_nascimento" value="<?= $cadastro['data_nascimento'] ?>" required>
    <select name="sexo" required>
        <option value="">Selecione o sexo</option>
        <option value="Masculino" <?= $cadastro['sexo'] === 'Masculino' ? 'selected' : '' ?>>Masculino</option>
        <option value="Feminino" <?= $cadastro['sexo'] === 'Feminino' ? 'selected' : '' ?>>Feminino</option>
    </select>
    <input type="text" name="cpf" value="<?= $cadastro['cpf'] ?>" required placeholder="CPF">
    <input type="email" name="email" value="<?= $cadastro['email'] ?>" required placeholder="Email">
    <input type="text" name="telefone" value="<?= $cadastro['telefone'] ?>" required placeholder="Telefone">
    <input type="text" name="cep" value="<?= $cadastro['cep'] ?>" required placeholder="CEP">
    <input type="text" name="logradouro" value="<?= $cadastro['logradouro'] ?>" required placeholder="Logradouro">
    <input type="text" name="bairro" value="<?= $cadastro['bairro'] ?>" required placeholder="Bairro">
    <input type="text" name="cidade" value="<?= $cadastro['cidade'] ?>" required placeholder="Cidade">
    <input type="text" name="uf" value="<?= $cadastro['uf'] ?>" required placeholder="UF">

    <button type="submit">Salvar Alterações</button>
    <button type="button" onclick="window.location.href='index.php'">Voltar</button>
</form>

</body>
</html>

<?php
session_start();

// Verifica se o usuário logado é um funcionário
if (!isset($_SESSION['funcionario'])) {
    header("Location: ../../login/login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli('localhost', 'root', 'adamanspc', 'loginfunconario');
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Coleta os dados do formulário
    $nome = $_POST['nome'] ?? '';
    $dataNascimento = $_POST['dataNascimento'] ?? '';
    $sexo = $_POST['sexo'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $cep = $_POST['cep'] ?? '';
    $logradouro = $_POST['logradouro'] ?? '';
    $bairro = $_POST['bairro'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $uf = $_POST['uf'] ?? '';

    // Prepara e executa o INSERT
    $stmt = $conn->prepare("INSERT INTO cadastros (nome, data_nascimento, sexo, cpf, email, telefone, cep, logradouro, bairro, cidade, uf) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $nome, $dataNascimento, $sexo, $cpf, $email, $telefone, $cep, $logradouro, $bairro, $cidade, $uf);

    if ($stmt->execute()) {
        echo "<script>alert('Cadastro realizado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar: " . $conn->error . "');</script>";
    }

    $stmt->close();
    $conn->close();
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro Completo</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0 10px;
        }

        form {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            max-width: 450px;
            width: 100%;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 700;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 12px 15px;
            margin-top: 12px;
            border: 1.8px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #2575fc;
            box-shadow: 0 0 6px rgba(37, 117, 252, 0.6);
        }

        .btn-group {
            margin-top: 25px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
        }

        button {
            flex: 1;
            padding: 12px 0;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            color: white;
        }

        button[type="submit"] {
            background-color: #4CAF50;
        }

        button[type="submit"]:hover {
            background-color: #3e8e41;
        }

        .voltar {
            background-color: #f44336;
        }

        .voltar:hover {
            background-color: #d32f2f;
        }

        .listar {
            background-color: #2196F3;
        }

        .listar:hover {
            background-color: #1769aa;
        }

        @media (max-width: 400px) {
            .btn-group {
                flex-direction: column;
            }

            button {
                flex: unset;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <form method="post" action="cadastro.php">
        <h2>Cadastro de Pessoa</h2>

        <input type="text" name="nome" placeholder="Nome completo" required>
        <input type="date" name="dataNascimento" required>
        <select name="sexo" required>
            <option value="" disabled selected>Selecione o sexo</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outro">Outro</option>
        </select>
        <input type="text" name="cpf" placeholder="CPF" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="tel" name="telefone" placeholder="Telefone" required>
        <input type="text" id="cep" name="cep" placeholder="CEP" required>
        <input type="text" id="logradouro" name="logradouro" placeholder="Rua" readonly>
        <input type="text" id="bairro" name="bairro" placeholder="Bairro" readonly>
        <input type="text" id="cidade" name="cidade" placeholder="Cidade" readonly>
        <input type="text" id="uf" name="uf" placeholder="UF" readonly>

        <div class="btn-group">
            <button type="submit" class="btn cadastrar">Cadastrar</button>
            <button type="button" class="btn voltar" onclick="location.href='../principal/principal.html'">Voltar</button>
            <button type="button" class="btn listar" onclick="location.href='../../Listagem/index.php'">Listar Cadastros</button>
        </div>
    </form>

    <script>
        document.getElementById('cep').addEventListener('blur', function () {
            const cep = this.value.replace(/\D/g, '');

            if (cep.length !== 8) {
                alert("CEP inválido.");
                return;
            }

            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(res => res.json())
                .then(data => {
                    if (data.erro) {
                        alert("CEP não encontrado.");
                        return;
                    }
                    document.getElementById('logradouro').value = data.logradouro || '';
                    document.getElementById('bairro').value = data.bairro || '';
                    document.getElementById('cidade').value = data.localidade || '';
                    document.getElementById('uf').value = data.uf || '';
                })
                .catch(() => {
                    alert("Erro ao buscar o CEP.");
                });
        });
    </script>
</body>

</html>

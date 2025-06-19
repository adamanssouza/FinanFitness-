<?php
session_start();

// Configuração do banco
$host = "localhost";
$user = "root";
$pass = "adamanspc";
$db   = "loginfunconario";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Captura e valida os dados
$perfil = $_POST['perfil'] ?? '';
$login  = trim($_POST['login'] ?? '');
$senha  = trim($_POST['senha'] ?? '');

if (empty($perfil) || empty($login) || empty($senha)) {
    echo "<script>alert('Preencha todos os campos!');history.back();</script>";
    exit();
}

// Define a tabela correta
$tabela = $perfil === 'funcionario' ? 'perfilFuncionarios' : ($perfil === 'aluno' ? 'alunos' : '');

if (!$tabela) {
    echo "<script>alert('Perfil inválido!');history.back();</script>";
    exit();
}

// Busca o usuário
$stmt = $conn->prepare("SELECT * FROM $tabela WHERE login = ?");
$stmt->bind_param("s", $login);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if ($senha === $user['senha']) {
        $_SESSION[$perfil] = $login;

        // Redireciona conforme o perfil
       // Redireciona conforme o perfil
    if ($perfil === 'funcionario') {
        header("Location: ../perfilFuncionario/Cadastro/cadastro.php");
    } else {
        header("Location: ../perfilAluno/perfilAluno.php");
    }
    exit();


        exit();
    } else {
        echo "<script>alert('Senha incorreta!');history.back();</script>";
        exit();
    }
} else {
    echo "<script>alert('Usuário não encontrado!');history.back();</script>";
    exit();
}
?>

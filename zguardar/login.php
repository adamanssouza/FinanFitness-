<?php
// Exemplo com PHP e banco de dados MySQL

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Conectar ao banco de dados
    $conn = new mysqli('localhost', 'usuario', 'senha', 'finanfitness');

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Preparar consulta SQL para verificar o login
    $sql = "SELECT * FROM usuarios WHERE nome = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login bem-sucedido, redirecionar para o perfil
        header("Location: perfilaluno.php");
    } else {
        echo "Usuário ou senha incorretos.";
    }

    $stmt->close();
    $conn->close();
}
?>

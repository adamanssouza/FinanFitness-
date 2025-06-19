<!-- login.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Finanfitness</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #3c9ada, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 320px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        input[type="submit"], input[type="button"] {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
            transition: 0.3s;
        }

        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<form action="../login/verificarLogin.php" method="POST">
    <h2>Login</h2>
    <select name="perfil" required>
        <option value="" disabled selected>Selecione o perfil</option>
        <option value="funcionario">Funcionário</option>
        <option value="aluno">Aluno</option>
        
    </select>
     <input type="text" name="login" placeholder="Login" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <input type="submit" value="Entrar">
    <input type="button" value="Voltar" onclick="window.location.href='../principal/principal.html';">

</form>

</body>
</html>

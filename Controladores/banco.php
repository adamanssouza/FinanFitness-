<?php
class Banco {
    private $mysqli;

    public function __construct() {
        $host = "localhost";
        $usuario = "root";
        $senha = "adamanspc";
        $banco = "loginfunconario"; // Novo nome do banco

        $this->mysqli = new mysqli($host, $usuario, $senha, $banco);

        if ($this->mysqli->connect_error) {
            die("Falha na conexão: " . $this->mysqli->connect_error);
        }
    }

    // LOGIN - FUNCIONÁRIO
    public function verificarLoginFuncionario($login, $senha) {
        $stmt = $this->mysqli->prepare("SELECT * FROM perfilFuncionarios WHERE login = ? AND senha = ?");
        $stmt->bind_param("ss", $login, $senha);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // LOGIN - ALUNO
    public function verificarLoginAluno($login, $senha) {
        $stmt = $this->mysqli->prepare("SELECT * FROM alunos WHERE login = ? AND senha = ?");
        $stmt->bind_param("ss", $login, $senha);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // CADASTROS (pessoas)
    public function setCadastro($nome, $data_nascimento, $sexo, $cpf, $email, $telefone, $cep, $logradouro, $bairro, $cidade, $uf){
        $stmt = $this->mysqli->prepare("INSERT INTO cadastros (nome, data_nascimento, sexo, cpf, email, telefone, cep, logradouro, bairro, cidade, uf) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss", $nome, $data_nascimento, $sexo, $cpf, $email, $telefone, $cep, $logradouro, $bairro, $cidade, $uf);
        return $stmt->execute();
    }

    public function getCadastros(){
        $result = $this->mysqli->query("SELECT * FROM cadastros");
        $dados = [];
        while($row = $result->fetch_assoc()){
            $dados[] = $row;
        }
        return $dados;
    }

    public function getCadastroById($id){
        $stmt = $this->mysqli->prepare("SELECT * FROM cadastros WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function deleteCadastro($id){
        $stmt = $this->mysqli->prepare("DELETE FROM cadastros WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function updateCadastro($id, $nome, $data_nascimento, $sexo, $cpf, $email, $telefone, $cep, $logradouro, $bairro, $cidade, $uf){
        $stmt = $this->mysqli->prepare("UPDATE cadastros SET nome=?, data_nascimento=?, sexo=?, cpf=?, email=?, telefone=?, cep=?, logradouro=?, bairro=?, cidade=?, uf=? WHERE id=?");
        $stmt->bind_param("sssssssssssi", $nome, $data_nascimento, $sexo, $cpf, $email, $telefone, $cep, $logradouro, $bairro, $cidade, $uf, $id);
        return $stmt->execute();
    }
}
?>

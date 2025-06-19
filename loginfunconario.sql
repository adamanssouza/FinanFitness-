-- Cria o banco de dados
CREATE DATABASE IF NOT EXISTS loginfunconario;
USE loginfunconario;



-- Criação da tabela 'usuarios' (funcionários, admins, etc)
CREATE TABLE IF NOT EXISTS perfilFuncionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

-- Criação da tabela 'alunos'
CREATE TABLE IF NOT EXISTS alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

-- Inserir um usuário (por exemplo, admin)
INSERT INTO perfilFuncionarios (login, senha) VALUES (
    'admin', 
    '0000'
);

-- Inserir um aluno
INSERT INTO alunos (login, senha) VALUES (
    'aluno', 
    '0000'
);
INSERT INTO perfilFuncionarios (login, senha) VALUES (
    'bruno', 
    '0000'
);
INSERT INTO alunos (login, senha) VALUES (
    'kaue', 
    '0000'
);

CREATE TABLE IF NOT EXISTS cadastros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    data_nascimento DATE,
    sexo VARCHAR(20),
    cpf VARCHAR(20),
    email VARCHAR(100),
    telefone VARCHAR(20),
    cep VARCHAR(10),
    logradouro VARCHAR(100),
    bairro VARCHAR(100),
    cidade VARCHAR(100),
    uf VARCHAR(2)
);
SHOW COLUMNS FROM cadastros;

SELECT * FROM cadastros;

INSERT INTO cadastros (nome, data_nascimento, sexo, cpf, email, telefone, cep, logradouro, bairro, cidade, uf)
VALUES ('Dr. Luiz Gustavo Pinto', '1979-01-26', 'Masculino', '820.734.596-92', 'da-costabreno@hotmail.com', '21 3389-8330', '28717-343', 'Núcleo Rodrigo Campos', 'João Alfredo', 'Cunha', 'PE');
INSERT INTO cadastros (nome, data_nascimento, sexo, cpf, email, telefone, cep, logradouro, bairro, cidade, uf)
VALUES ('Raquel Martins', '1965-04-07', 'Feminino', '956.431.820-33', 'cardosorafaela@hotmail.com', '21 7036 1710', '93260-415', 'Morro Rafael Rezende', 'Santa Cecilia', 'Campos', 'RJ');
INSERT INTO cadastros (nome, data_nascimento, sexo, cpf, email, telefone, cep, logradouro, bairro, cidade, uf)
VALUES ('Bruno Monteiro', '1992-11-13', 'Feminino', '469.013.752-80', 'laviniaramos@bol.com.br', '+55 (081) 4260-8979', '36633-109', 'Via Almeida', 'Cdi Jatoba', 'Freitas', 'CE');


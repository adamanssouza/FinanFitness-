# 🏋️‍♂️ FinanFitness

Sistema web para academias, com controle de cadastros, login por perfis (aluno e funcionário), notificações, geração de boletos e exportação em PDF. Criado em PHP com foco em organização financeira e de usuários.

![FinanFitness Screenshot](img/captura_sistema.png)

---

## 🚀 Funcionalidades

- ✅ Login com perfil de **Aluno** ou **Funcionário**
- ✅ Cadastro, edição, exclusão e listagem de usuários
- ✅ Geração de boletos simulados
- ✅ Notificações para usuários
- ✅ Geração de relatórios em PDF (DomPDF)
- ✅ Controle de permissões
- ✅ Interface amigável e responsiva

---

## 🧰 Tecnologias utilizadas

- PHP 7+
- MySQL (banco: `loginfunconario`)
- HTML5 + CSS3
- JavaScript
- [DomPDF](https://github.com/dompdf/dompdf) (para gerar PDF)
- Bootstrap (opcional)
- Git + GitHub

---

## 🗂 Estrutura de banco de dados

Tabelas principais:

- `cadastros`: armazena pessoas cadastradas
- `perfilFuncionarios`: gerencia os perfis de funcionários
- `alunos`: dados dos alunos

---

## ⚙️ Como rodar o projeto localmente

1. Clone este repositório:
   ```bash
   git clone https://github.com/adamanssouza/FinanFitness-.git

// senha.js
document.getElementById('formCadastro').addEventListener('submit', function(event) {
    const senha = document.getElementById('senha').value;
    const confirmarSenha = document.getElementById('confirmar_senha').value;

    // Verifica se as senhas são iguais
    if (senha !== confirmarSenha) {
        alert('As senhas não coincidem. Por favor, tente novamente.');
        event.preventDefault(); // Impede o envio do formulário
        return;
    }

    // Verifica se a senha atende aos requisitos mínimos (mínimo 8 caracteres, 1 letra e 1 número)
    const senhaRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    if (!senhaRegex.test(senha)) {
        alert('A senha deve ter pelo menos 8 caracteres, incluindo uma letra e um número.');
        event.preventDefault(); // Impede o envio do formulário
    }
});

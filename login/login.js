document.querySelector('form').addEventListener('submit', function (event) {
    event.preventDefault();
    const nome = document.getElementById('nome').value;
    const senha = document.getElementById('senha').value;

    if (nome && senha) {
        // Simulação de login
        alert('Login bem-sucedido!');
    } else {
        alert('Por favor, preencha todos os campos.');
    }
});

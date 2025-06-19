<?php
// notificacoes.php
header('Content-Type: application/json');

// 🔸 Simulação de notificações (você pode futuramente conectar ao banco de dados aqui)
$notificacoes = [
    [
        "tipo" => "pendente",
        "mensagem" => "⚠️ Você possui 2 boletos pendentes. Evite juros!",
        "data" => date('Y-m-d')
    ],
    [
        "tipo" => "promocao",
        "mensagem" => "🎉 Nova promoção: Pague 3 meses e ganhe 1 grátis!",
        "data" => date('Y-m-d', strtotime('-1 day'))
    ]
];

// 🔸 Envia os dados como JSON para o frontend
echo json_encode($notificacoes);

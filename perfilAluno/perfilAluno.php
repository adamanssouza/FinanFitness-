<?php
$notificacoes = [
    [
        "tipo" => "pendente",
        "mensagem" => "⚠️ Você possui 2 boletos pendentes. Abril e Maio! Evite juros!",
        "data" => date('Y-m-d')
    ],
    [
        "tipo" => "promocao",
        "mensagem" => "🎉 Nova promoção: Pague 3 meses e ganhe 1 grátis!",
        "data" => date('Y-m-d', strtotime('-1 day'))
    ]
];
$boletos = [
    "Janeiro" => ["valor" => 150.00, "vencimento" => "10/01/2025", "status" => "pago"],
    "Fevereiro" => ["valor" => 150.00, "vencimento" => "10/02/2025", "status" => "pago"],
    "Março" => ["valor" => 150.00, "vencimento" => "10/03/2025", "status" => "pago"],
    "Abril" => ["valor" => 150.00, "vencimento" => "10/04/2025", "status" => "pendente"],
    "Maio" => ["valor" => 150.00, "vencimento" => "10/05/2025", "status" => "pendente"],
    "Junho" => ["valor" => 150.00, "vencimento" => "10/06/2025", "status" => "pago"],
    "Julho" => ["valor" => 150.00, "vencimento" => "10/07/2025", "status" => "pago"],
    "Agosto" => ["valor" => 150.00, "vencimento" => "10/08/2025", "status" => "pago"],
    "Setembro" => ["valor" => 150.00, "vencimento" => "10/09/2025", "status" => "pago"],
    "Outubro" => ["valor" => 150.00, "vencimento" => "10/10/2025", "status" => "pago"],
    "Novembro" => ["valor" => 150.00, "vencimento" => "10/11/2025", "status" => "pago"],
    "Dezembro" => ["valor" => 150.00, "vencimento" => "10/12/2025", "status" => "pago"],
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Perfil de Aluno</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        .meses {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-top: 15px;
        }

        .meses button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 18px;
            font-weight: bold;
            font-size: 14px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 3px 6px rgba(40, 167, 69, 0.4);
        }

        .meses button:hover {
            background-color: #218838;
            box-shadow: 0 4px 10px rgba(33, 136, 56, 0.6);
        }

        .meses button.vermelho {
            background-color: #dc3545;
            box-shadow: 0 3px 6px rgba(220, 53, 69, 0.4);
        }

        .meses button.vermelho:hover {
            background-color: #c82333;
            box-shadow: 0 4px 10px rgba(200, 35, 51, 0.6);
        }

        #boleto {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 15px;
            max-width: 600px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }
        #boleto .linha {
            margin-bottom: 10px;
        }
        .codigo-barra {
            font-family: monospace;
            font-size: 16px;
            text-align: center;
            background: #f8f8f8;
            padding: 10px;
            margin-top: 20px;
            border-radius: 6px;
        }

        .btn-pdf {
            display: block;
            margin: 20px auto 0;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .notificacao {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .pendente {
            background-color: #fff3cd;
            border-left: 5px solid #ffc107;
        }

        .promocao {
            background-color: #d4edda;
            border-left: 5px solid #28a745;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="background">
        <img class="foto" src="img/fundo3.jpg" alt="Imagem de fundo" />
    </div>
    <div class="container">
        <div class="sidebar">
            <h2>Perfil de Aluno</h2>
            <ul>
                <li><a href="#" onclick="mostrarAba('mensalidade'); return false;">Mensalidade</a></li>
                <li><a href="#" onclick="mostrarAba('notificacoes'); return false;">Notificações</a></li>
            </ul>
            <a href="../principal/index.html"><img src="img/lg.png" alt="Logo da Finanfitness" class="logo" /></a>
        </div>
        <div class="content">
            <!-- Aba Mensalidade -->
            <div id="mensalidade" class="tab-content active">
                <h3>Mensalidade</h3>
                <div class="meses">
                    <?php foreach ($boletos as $mes => $dados): ?>
                        <?php $classe = $dados['status'] === 'pendente' ? 'vermelho' : ''; ?>
                        <button class="<?php echo $classe; ?>" onclick="gerarBoleto('<?php echo $mes; ?>')">
                            <?php echo $mes; ?>
                        </button>
                    <?php endforeach; ?>
                </div>

                <div id="boleto" style="display:none;">
                    <h3>Boleto de Pagamento</h3>
                    <div class="linha"><strong>Mês:</strong> <span id="mes"></span></div>
                    <div class="linha"><strong>Beneficiário:</strong> FinanFitness LTDA</div>
                    <div class="linha"><strong>Vencimento:</strong> <span id="vencimento"></span></div>
                    <div class="linha"><strong>Valor:</strong> R$ <span id="valor"></span></div>
                    <div class="linha"><strong>Nosso Número:</strong> <span id="nossoNumero"></span></div>
                    <div class="codigo-barra" id="codigoBarra"></div>

                    <form method="post" action="imprimir.php" target="_blank" id="formBoleto">
                        <input type="hidden" name="mes" id="mesPdf" />
                        <input type="hidden" name="vencimento" id="vencimentoPdf" />
                        <input type="hidden" name="valor" id="valorPdf" />
                        <input type="hidden" name="nossoNumero" id="nossoNumeroPdf" />
                        <input type="hidden" name="codigoBarra" id="codigoBarraPdf" />
                        <button type="submit" class="btn-pdf">📄 Imprimir ou Gerar PDF</button>
                    </form>
                </div>
            </div>

            <!-- Aba Notificações -->
            <div id="notificacoes" class="tab-content">
                <h3>Notificações</h3>
                <?php if (count($notificacoes) === 0): ?>
                    <p>Sem notificações no momento.</p>
                <?php else: ?>
                    <?php foreach ($notificacoes as $n): ?>
                        <div class="notificacao <?php echo $n['tipo']; ?>">
                            <strong><?php echo $n['data']; ?></strong><br />
                            <?php echo $n['mensagem']; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        const dadosBoletos = <?php echo json_encode($boletos); ?>;

        function mostrarAba(aba) {
            document.querySelectorAll('.tab-content').forEach(div => div.classList.remove('active'));
            document.getElementById(aba).classList.add('active');
        }

        function gerarBoleto(mes) {
            const dados = dadosBoletos[mes];
            const nossoNumero = Math.floor(10000000000 + Math.random() * 89999999999);
            const codigoBarra = "23791.11101 22222.222229 33333.333333 4 56780000012345";

            document.getElementById("mes").textContent = mes;
            document.getElementById("vencimento").textContent = dados.vencimento;
            document.getElementById("valor").textContent = dados.valor.toFixed(2);
            document.getElementById("nossoNumero").textContent = nossoNumero;
            document.getElementById("codigoBarra").textContent = codigoBarra;

            document.getElementById("mesPdf").value = mes;
            document.getElementById("vencimentoPdf").value = dados.vencimento;
            document.getElementById("valorPdf").value = dados.valor.toFixed(2);
            document.getElementById("nossoNumeroPdf").value = nossoNumero;
            document.getElementById("codigoBarraPdf").value = codigoBarra;

            document.getElementById("boleto").style.display = "block";
        }

        window.onload = () => mostrarAba('mensalidade');
    </script>
</body>
</html>

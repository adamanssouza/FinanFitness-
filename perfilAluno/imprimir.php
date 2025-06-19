<?php
require '../vendor/autoload.php'; // ajuste o caminho conforme necessário
use Dompdf\Dompdf;

// Coleta os dados do formulário
$mes = $_POST['mes'] ?? 'Não informado';
$vencimento = $_POST['vencimento'] ?? 'Não informado';
$valor = $_POST['valor'] ?? '0,00';
$nossoNumero = $_POST['nossoNumero'] ?? '0000000000';
$codigoBarra = $_POST['codigoBarra'] ?? '00000.00000 00000.000000 00000.000000 0 00000000000000';

// Gera o HTML do boleto
$html = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            padding: 30px;
        }
        h2 {
            text-align: center;
        }
        p {
            font-size: 14px;
            margin: 6px 0;
        }
        .codigo-barra {
            font-family: monospace;
            font-size: 16px;
            text-align: center;
            background: #eee;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Boleto de Pagamento</h2>
    <p><strong>Mês:</strong> $mes</p>
    <p><strong>Beneficiário:</strong> FinanFitness LTDA</p>
    <p><strong>Vencimento:</strong> $vencimento</p>
    <p><strong>Valor:</strong> R$ $valor</p>
    <p><strong>Nosso Número:</strong> $nossoNumero</p>
    <div class='codigo-barra'>$codigoBarra</div>
</body>
</html>
";

// Gera o PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper("A4", "portrait");
$dompdf->render();
$dompdf->stream("boleto_$mes.pdf", ["Attachment" => false]);
exit;

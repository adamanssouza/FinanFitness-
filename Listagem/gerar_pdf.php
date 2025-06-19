<?php
require_once '../vendor/autoload.php';
require_once '../Controladores/banco.php';

use Dompdf\Dompdf;

$banco = new Banco();
$cadastros = $banco->getCadastros();

$html = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Cadastros</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Lista de Cadastros</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data Nasc.</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Cidade</th>
                <th>UF</th>
            </tr>
        </thead>
        <tbody>';

foreach ($cadastros as $c) {
    $html .= "<tr>
        <td>" . htmlspecialchars($c['nome']) . "</td>
        <td>" . htmlspecialchars($c['data_nascimento']) . "</td>
        <td>" . htmlspecialchars($c['cpf']) . "</td>
        <td>" . htmlspecialchars($c['email']) . "</td>
        <td>" . htmlspecialchars($c['cidade']) . "</td>
        <td>" . htmlspecialchars($c['uf']) . "</td>
    </tr>";
}

$html .= '
        </tbody>
    </table>
</body>
</html>';

// Gera o PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("lista_cadastros.pdf", ["Attachment" => false]);
exit;

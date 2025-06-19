<?php
require_once("../Controladores/banco.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $banco = new Banco();
    $banco->deleteCadastro($id);
}

header("Location: ../Listagem/index.php");
exit();
?>

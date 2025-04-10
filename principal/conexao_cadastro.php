<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', 'kklidi12');
    define('BASE', 'cadastro_finan');

    $conn = new mysqli(HOST, USER, PASS, BASE);

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }
?>

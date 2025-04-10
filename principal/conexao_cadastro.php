<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', 'senha do mysql'); //senha do mysql
    define('BASE', 'cadastro_finan');

    $conn = new mysqli(HOST, USER, PASS, BASE);

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }
?>

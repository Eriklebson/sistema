<?php
    define ('HOSTNAME', 'localhost');
    define ('USERNAME', 'root');
    define ('PASSWORD', null);
    define ('DATABASE', 'sistema');

    $conn = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if (mysqli_connect_error()) {
        die('Erro na conexão ('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
?>
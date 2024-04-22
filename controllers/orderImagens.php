<?php
    include 'conn.php';
    $imagens = $_POST['imagens'];
    $pos = 1;

    foreach($imagens as $image){
        $conn->query("update photos set order_ = '$pos' where id = $image;");
        $pos ++;
    }
?>
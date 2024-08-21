<?php
    include ("./series.php");
    include ("../Bd/bd.php");

    $serie= new series();
    $res=$serie->();
    print_r($res);
?>
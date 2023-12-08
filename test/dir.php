<?php

    require __DIR__ . "/../app/models/atm.php";

    $atm = new Atm();
    
    var_dump($atm->display());

?>
<?php

    require_once("../app/models/user.php");
    require_once("../app/models/address.php");
    
    $user = new User();
    $address = new Address();

    $id = "1119189929657334b53b8ea8.18179309";
    // $user->delete($id);

    // $user->edit($id, "test", "test", "test", 1);

    $currentUser = $user->search($id);
    $currentAddressId = $currentUser['address_id'];

    $address->edit($currentAddressId, "ee", "ee", "ee", 11, "eeee", 3333);

    // $currentUser = $user->searchAll($id);
    // $currentAddressId = $currentUser['address_id'];
    // var_dump($currentUser);
    // var_dump($currentAddressId);
    // $address->delete($currentAddressId);
?>
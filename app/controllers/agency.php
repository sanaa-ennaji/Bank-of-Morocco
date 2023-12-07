<?php

    require_once("../models/random.php");
    require_once("../models/address.php");
    require_once("../models/agency.php");

    $address = new Address();
    $agency = new Agency();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // ---------  ADDRESS PROPS --------- //
        
        $city = $_POST['city'];
        $district = $_POST['district'];
        $street = $_POST['street'];
        $codePostal = $_POST['codePostal'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];

        // ---------  AGENCY PROPS --------- //

        $longitude = $_POST['longitude'];
        $latitude = $_POST['latitude'];
        $bank_id = $_POST['bank_id'];


    // ---------=  EDIT =--------- //

        if(isset($_POST['submit']) && $_POST['submit'] == 'Edit') {

            $id = $_POST['id'];
            $currentagency = $agency->search($id);
            $currentAddressId = $currentagency['address_id'];

            $address->edit($currentAddressId, $city, $district, $street, $codePostal, $email, $telephone);

            $agency->edit($id, $longitude, $latitude, $bank_id);


    // ---------=  ADD =--------- //

        } else if(isset($_POST['submit']) && $_POST['submit'] == 'Submit') {

            $random = new Random();

            $id = $random->get();
            $address->add($id, $city, $district, $street, $codePostal, $email, $telephone);
            $lastAddress = $address->getLast();
            $addressId = $lastAddress['id'];

            $id = $random->get();
            $agency->add($id, $longitude, $latitude, $bank_id, $addressId);


        }

        header("Location: ../../admin/");
    }

    // ---------=  DELETE =--------- //

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

        if(isset($_GET['id'])) {

            $id = $_GET['id'];
            $currentagency = $agency->search($id);
            $currentAddressId = $currentagency['address_id'];
            $address->delete($currentAddressId);
            $agency->delete($id);

            header("Location: ../views/admin/index.php");
        }

    }

    // ---------=  DISPLAY =--------- //
    
    $agencies = $agency->displayAll();


?>
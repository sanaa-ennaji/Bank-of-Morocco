<?php

    require_once(__DIR__ . "/../models/random.php");
    require_once(__DIR__ . "/../models/atm.php");

    $atm = new Atm();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $longitude = $_POST['longitude'];
        $latitude = $_POST['latitude'];
        $address = $_POST['address'];
        $bank_id = $_POST['bank_id'];

    // ---------  EDIT --------- //

        if(isset($_POST['submit']) && $_POST['submit'] == 'Edit') {

            $id = $_POST['id'];

            $atm->edit($id, $longitude, $latitude, $address, $bank_id);

    // ---------  ADD --------- //

        } else if(isset($_POST['submit']) && $_POST['submit'] == 'Submit') {

            $random = new Random();
            
            $id = $random->get();
            $atm->add($id, $longitude, $latitude, $address, $bank_id);
        }

        // header("Location: ../views/admin/index.php");
    }

    // ---------  DELETE --------- //

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

        if(isset($_GET['id'])) {

            $id = $_GET['id'];
            $atm->delete($id);

            header("Location: ../views/admin/index.php");
        }

    }

    // ---------  DISPLAY --------- //
    
    $atms = $atm->display();


?>
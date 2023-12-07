<?php

    require_once("../models/random.php");
    require_once("../models/bank.php");

    $bank = new Bank();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = $_POST['name'];
        $logo = $_POST['logo'];

    // ---------  EDIT --------- //

        if(isset($_POST['submit']) && $_POST['submit'] == 'Edit') {

            $id = $_POST['id'];

            $bank->edit($id, $name, $logo);

    // ---------  ADD --------- //

        } else if(isset($_POST['submit']) && $_POST['submit'] == 'Submit') {

            $random = new Random();
            
            $id = $random->get();
            $bank->add($id, $name, $logo);
        }

        // header("Location: ../views/admin/index.php");
    }

    // ---------  DELETE --------- //

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

        if(isset($_GET['id'])) {

            $id = $_GET['id'];
            $bank->delete($id);

            header("Location: ../views/admin/index.php");
        }

    }

    // ---------  DISPLAY --------- //
    
    $banks = $bank->display();


?>
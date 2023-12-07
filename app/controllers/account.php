<?php

    require_once("../models/random.php");
    require_once("../models/account.php");

    $account = new Account();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $rib = $_POST['rib'];
        $currency = $_POST['currency'];
        $balance = $_POST['balance'];
        $user_id = $_POST['user_id'];

    // ---------  EDIT --------- //

        if(isset($_POST['submit']) && $_POST['submit'] == 'Edit') {

            $id = $_POST['id'];
            $account->edit($id, $rib, $currency, $balance, $user_id);

    // ---------  ADD --------- //

        } else if(isset($_POST['submit']) && $_POST['submit'] == 'Submit') {

            $random = new Random();

            $id = $random->get();
            $account->add($id, $rib, $currency, $balance, $user_id);
        }

        // header("Location: ../views/admin/index.php");
    }

    // ---------  DELETE --------- //

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

        if(isset($_GET['id'])) {

            $id = $_GET['id'];
            $account->delete($id);

            header("Location: ../views/admin/index.php");
        }

    }

    // ---------  DISPLAY --------- //
    
    $accounts = $account->display();


?>
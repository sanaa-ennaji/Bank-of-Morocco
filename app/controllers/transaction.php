<?php

    require_once("../models/random.php");
    require_once("../models/transaction.php");

    $transaction = new Transaction();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $type = $_POST['type'];
        $amount = $_POST['amount'];
        $account = $_POST['account'];

    // ---------  EDIT --------- //

        if(isset($_POST['submit']) && $_POST['submit'] == 'Edit') {

            $id = $_POST['id'];

            $transaction->edit($id, $type, $amount, $account);

    // ---------  ADD --------- //

        } else if(isset($_POST['submit']) && $_POST['submit'] == 'Submit') {

            $random = new Random();
            $id = $random->get();

            echo "eee";

            $transaction->add($id, $type, $amount, $account);
        }

        // header("Location: ../views/admin/index.php");
    }

    // ---------  DELETE --------- //

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

        if(isset($_GET['id'])) {

            $id = $_GET['id'];
            $transaction->delete($id);

            header("Location: ../views/admin/index.php");
        }

    }

    // ---------  DISPLAY --------- //
    
    $transactions = $transaction->display();


?>
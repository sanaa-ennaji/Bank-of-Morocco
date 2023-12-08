<?php

require_once(__DIR__ . "/../models/random.php");
require_once(__DIR__ . "/../models/transaction.php");

$transaction = new Transaction();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // ---------  ADD --------- //

    if (isset($_POST['submit'])) {

        $type = $_POST['type'];
        $amount = $_POST['amount'];
        $account = $_POST['account'];

        $random = new Random();
        $id = $random->get();

        try {
            $transaction->add($id, $type, $amount, $account);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

    // ---------  EDIT --------- //

    } else if (isset($_POST['edit'])) {

        $id = $_POST['id'];
        $type = $_POST['type'];
        $amount = $_POST['amount'];
        $account = $_POST['account'];

        try {
            $transaction->edit($id, $type, $amount, $account);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

    // ---------  DISPLAY --------- //

    } else {

        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; 
        $columnIndex = $_POST['order'][0]['column']; 
        $columnName = $_POST['columns'][$columnIndex]['data']; 
        $columnSortOrder = $_POST['order'][0]['dir']; 
        $searchValue = $_POST['search']['value']; 
        $searchArray = array();

         // ---------  DISPLAY --------- //
        $searchQuery = " ";
        if ($searchValue != '') {
            $searchQuery = " AND (id LIKE :id OR 
                    type LIKE :type OR 
                    amount LIKE :amount OR 
                    account LIKE :account) ";
            $searchArray = array(
                'id' => "%$searchValue%",
                'type' => "%$searchValue%",
                'amount' => "%$searchValue%",
                'account' => "%$searchValue%"
            );
        }


        $data = array();

        foreach ($records as $row) {
            $data[] = array(
                "id" => $row['id'],
                "type" => $row['type'],
                "amount" => $row['amount'],
                "account" => $row['account_id']
            );
        }

      
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        echo json_encode($response);
    }
}

// ---------  DELETE --------- //

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['delete'])) {

        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            try {
                $transaction->delete($id);
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        }
    } else if (isset($_GET['edit'])) {

        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $data = $transaction->search($id);

            echo json_encode($data);
        }
    }  else {
        echo "Invalid request. Please provide valid parameters.";
    }
    
}
?>

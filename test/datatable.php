<?php

    require_once("../app/models/bank.php");

    $bank = new Bank();

    $draw = $_POST['draw'];
    // $row = $_POST['start'];
    // $rowperpage = $_POST['length']; // Rows display per page
    // $columnIndex = $_POST['order'][0]['column']; // Column index
    // $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    // $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $searchValue = $_POST['search']['value']; // Search value

    // var_dump($bank->display()[0]['id']);

    $data[] = array(
        "id" => $bank->display()[0]['id'],
        "name" => $bank->display()[0]['name'],
        "logo" => $bank->display()[0]['logo']
    );

    // var_dump($data);

    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => 10,
        "iTotalDisplayRecords" => 10,
        "aaData" => $data
    );
  
    echo json_encode($response);


?>
<?php

    require_once("../app/models/bank.php");
    require_once("../app/models/random.php");


$name = $_POST['name'];
$logo = $_POST['logo'];
$bank = new Bank();


$array = explode(',', $_POST['checks']);

foreach($array as $row):
    $bank->add($row, $row, "11");
endforeach;

echo json_encode($array);





// $random = new Random();

// $id = $random->get();
// if(isset($_POST['submit'])) {
//     try{
//         $bank->add($id, $name, $logo);
//     } catch (PDOException $e){
//         die("Error: " . $e->getMessage());
//     }
// }

?>
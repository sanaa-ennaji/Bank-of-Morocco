<?php

    require_once("../app/models/db.php");

    $db = new Database();

    try {
        $sql = "SELECT * FROM transaction";
        $query = $db->connect()->query($sql);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        var_dump($data);
    } catch (PDOException $e){
        die("Error: " . $e->getMessage());
    }

?>
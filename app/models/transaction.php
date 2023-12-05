<?php

require_once("DataProvider.php");

class Transaction extends DataProvider {
    
    public function insert($amount, $type){
        try {
            $sql = "INSERT INTO transaction (amount, type) VALUES (:amount, :type)";
            $stmt = $this->connect()->prepare($sql); 
            $stmt->bindParam(":amount", $amount);
            $stmt->bindParam(":type", $type);
            $stmt->execute();
        } catch (PDOException $e){
            die("Error: ". $e->getMessage());
        }
    }

    public function display(){
        try {
            $sql = "SELECT * FROM transaction";
            $query = $this->connect()->query($sql);
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e){
            die("Error: " . $e->getMessage());
        }
    }

    
    public function displayOne($id){
        try {
            $sql = "SELECT * FROM transaction WHERE transactionId = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e){
            die("Error: " . $e->getMessage());
        }
    }
    

    public function delete($id){
        try {
            $sql = "DELETE FROM transaction WHERE transactionId = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (PDOException $e){
            die("Error: " . $e->getMessage());
        }
    }
}

?>

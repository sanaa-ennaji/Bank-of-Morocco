<?php

require_once("db.php");

class Transaction extends Database {
    
    public function add($id, $amount, $type, $accountId){
        try {
            $sql = "INSERT INTO transaction VALUES (:id, :amount, :type, :accountId)";
            $stmt = $this->connect()->prepare($sql); 
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":amount", $amount);
            $stmt->bindParam(":type", $type);
            $stmt->bindParam(":accountId", $accountId);
            $stmt->execute();
        } catch (PDOException $e){
            die("Error: ". $e->getMessage());
        }
    }

    public function edit($id, $amount, $type, $accountId){
        try {
            $sql = "UPDATE transaction SET amount = :amount, type = :type, account_id = :accountId WHERE id = :id";
            $stmt = $this->connect()->prepare($sql); 
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":amount", $amount);
            $stmt->bindParam(":type", $type);
            $stmt->bindParam(":accountId", $accountId);
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

    
    public function search($id){
        try {
            $sql = "SELECT * FROM transaction WHERE id = :id";
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
            $sql = "DELETE FROM transaction WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (PDOException $e){
            die("Error: " . $e->getMessage());
        }
    }
}

?>

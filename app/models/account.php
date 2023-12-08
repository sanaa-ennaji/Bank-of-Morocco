<?php

    require_once("db.php");

    class account extends Database {
        
        public function add($id, $rib, $currency, $balance, $userId){
            try {
                $sql = "INSERT INTO account VALUES (:id, :rib, :currency, :balance, :user_id)";
                $stmt = $this->connect()->prepare($sql); 
                $stmt->bindParam(":id", $id);
                $stmt->bindParam(":rib", $rib);
                $stmt->bindParam(":currency", $currency);
                $stmt->bindParam(":balance", $balance);
                $stmt->bindParam(":user_id", $userId);
                $stmt->execute();
            } catch (PDOException $e){
                die("Error: ". $e->getMessage());
            }
        }

        public function display(){
            try {
                $sql = "SELECT * FROM account";
                $query = $this->connect()->query($sql);
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            } catch (PDOException $e){
                die("Error: " . $e->getMessage());
            }
        }

        public function search($id){
            try {
                $sql = "SELECT * FROM account WHERE id = :id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                return $data;
            } catch (PDOException $e){
                die("Error: " . $e->getMessage());
            }
        }

        public function edit($id, $rib, $currency, $balance, $userId){
            try {
                $sql = "UPDATE account SET rib = :rib, currency = :currency, balance = :balance, user_id = :user_id WHERE id = :id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(":rib", $rib);
                $stmt->bindParam(":currency", $currency);
                $stmt->bindParam(":balance", $balance);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (PDOException $e){
                    die("Error: " . $e->getMessage());
                
            }
        }

        public function delete($id){
            try {
                $sql = "DELETE FROM account WHERE id = :id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (PDOException $e){
                die("Error: " . $e->getMessage());
            }
        }
    }

?>
<?php

    require_once("DataProvider.php");

    class account extends DataProvider {
        
        public function insert($rib, $currency, $balance){
            try {
                $sql = "INSERT INTO account (rib, currency, balance) VALUES (:rib, :currency, :balance)";
                $stmt = $this->connect()->prepare($sql); 
                $stmt->bindParam(":rib", $rib);
                $stmt->bindParam(":currency", $currency);
                $stmt->bindParam(":balance", $balance);
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

        public function displayOne($id){
            try {
                $sql = "SELECT * FROM account WHERE accountId = :id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                return $data;
            } catch (PDOException $e){
                die("Error: " . $e->getMessage());
            }
        }

        public function update($id, $rib, $currency, $balance){
            try {
                $sql = "UPDATE account SET rib = :rib, currency = :currency, balance = :balance WHERE accountId = :id";
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
                $sql = "DELETE FROM account WHERE accountId = :id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (PDOException $e){
                die("Error: " . $e->getMessage());
            }
        }
    }

?>
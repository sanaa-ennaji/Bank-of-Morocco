<?php

    require_once("cnx.php");

    class Agency extends Dataprovider {
        
        public function insert($longitude, $latitude, $bank_id, $address_id){
            try {
                $sql = "INSERT INTO agency (longitude, latitude, bank_id, address_id) VALUES (:longitude, :latitude, :bank_id, :address_id)";
                $stmt = $this->connect()->prepare($sql); 
                $stmt->bindParam(":longitude", $longitude);
                $stmt->bindParam(":latitude", $latitude);
                $stmt->bindParam(":longitude", $bank_id);
                $stmt->bindParam(":bank_id", $address_id);
                $stmt->execute();
            } catch (PDOException $e){
                die("Error: ". $e->getMessage());
            }
        }
        

      



        public function display(){
            try {
                $sql = "SELECT * FROM agency";
                $query = $this->connect()->query($sql);
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            } catch (PDOException $e){
                die("Error: " . $e->getMessage());
            }
        }

        public function displayOne($id){
            try {
                $sql = "SELECT * FROM agency WHERE agencyId = :id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                return $data;
            } catch (PDOException $e){
                die("Error: " . $e->getMessage());
            }
        }

        public function update($id, $longitude, $latitude, $bank_id, $address_id){
            try {
                $sql = "UPDATE agency SET longitude = :longitude, latitude = :latitude, bank_id = :bank_id, address_id = :address_id WHERE agencyId = :id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(":longitude", $longitude);
                $stmt->bindParam(":latitude", $latitude);
                $stmt->bindParam(":bank_id", $bank_id);
                $stmt->bindParam(":address_id", $address_id);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (PDOException $e){
                    die("Error: " . $e->getMessage());
                
            }
        }

        public function delete($id){
            try {
                $sql = "DELETE FROM agency WHERE agencyId = :id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (PDOException $e){
                die("Error: " . $e->getMessage());
            }
        }
    }

?>
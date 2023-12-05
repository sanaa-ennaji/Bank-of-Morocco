<?php

require_once("DataProvider.php");

class Distributer extends DataProvider {

    public function insert($address, $longitude, $latitude, $bankId) {
        try {
            $sql = "INSERT INTO atm (address, longitude, latitude, bankId) VALUES (:address, :longitude, :latitude, :bankId)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":longitude", $longitude);
            $stmt->bindParam(":latitude", $latitude);
            $stmt->bindParam(":bankId", $bankId);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function display() {
        try {
            $sql = "SELECT * FROM atm";
            $query = $this->connect()->query($sql);
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function displayOne($id) {
        try {
            $sql = "SELECT * FROM atm WHERE atmId = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function update($id, $address, $longitude, $latitude) {
        try {
            $sql = "UPDATE atm SET address = :address, longitude = :longitude, latitude = :latitude WHERE atmId = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":longitude", $longitude);
            $stmt->bindParam(":latitude", $latitude);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM atm WHERE atmId = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

?>

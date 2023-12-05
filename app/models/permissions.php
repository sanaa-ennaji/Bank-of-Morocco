<?php

require_once("DataProvider.php");

class Permission extends DataProvider {

    public function insert($permissionName) {
        try {
            $sql = "INSERT INTO permissions (permissionName ,) VALUES (:permissionName)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":permissionName", $permissionName);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function display() {
        try {
            $sql = "SELECT * FROM permissions";
            $query = $this->connect()->query($sql);
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function update($permissionId, $permissionName) {
        try {
            $sql = "UPDATE permissions SET permissionName = :permissionName WHERE permissionId = :permissionId";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":permissionName", $permissionName);
            $stmt->bindParam(":permissionId", $permissionId);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function delete($permissionId) {
        try {
            $sql = "DELETE FROM permissions WHERE permissionId = :permissionId";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":permissionId", $permissionId);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

?>

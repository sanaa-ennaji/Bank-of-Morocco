<?php

require_once("DataProvider.php");

class Role extends DataProvider {

    public function insert($roleName) {
        try {
            $sql = "INSERT INTO roles (roleName) VALUES (:roleName)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":roleName", $roleName);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

      public function display() {
        try {
            $sql = "SELECT * FROM roles";
            $query = $this->connect()->query($sql);
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function update($roleId, $roleName) {
        try {
            $sql = "UPDATE roles SET roleName = :roleName WHERE roleId = :roleId";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":roleName", $roleName);
            $stmt->bindParam(":roleId", $roleId);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function delete($roleId) {
        try {
            $sql = "DELETE FROM roles WHERE roleId = :roleId";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":roleId", $roleId);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

?>

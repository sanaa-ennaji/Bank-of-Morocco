 <!-- #region -->
 <?php

require_once("DataProvider.php");

class User extends DataProvider {

    public function insert($userName, $roleId) {
        try {
            $sql = "INSERT INTO users (userName, roleId) VALUES (:userName, :roleId)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":userName", $userName);
            $stmt->bindParam(":roleId", $roleId);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function display() {
        try {
            $sql = "SELECT * FROM users";
            $query = $this->connect()->query($sql);
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function update($userId, $userName, $roleId) {
        try {
            $sql = "UPDATE users SET userName = :userName, roleId = :roleId WHERE userId = :userId";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":userName", $userName);
            $stmt->bindParam(":roleId", $roleId);
            $stmt->bindParam(":userId", $userId);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function delete($userId) {
        try {
            $sql = "DELETE FROM users WHERE userId = :userId";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":userId", $userId);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

?>


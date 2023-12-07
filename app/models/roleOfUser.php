 <?php

require_once("db.php");

class roleOfUser extends Database {

    public function add($id, $user, $role) {
        try {
            $sql = "INSERT INTO roleOfUSer VALUES (:id, :user, :role)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":user", $user);
            $stmt->bindParam(":role", $role);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function display() {
        try {
            $sql = "SELECT * FROM roleOfUser";
            $query = $this->connect()->query($sql);
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function edit($id, $user, $role) {
        try {
            $sql = "UPDATE roleOfUser SET user_id = :user, role_id = :role WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":user", $user);
            $stmt->bindParam(":role", $role);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM roleOfUser WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

?>
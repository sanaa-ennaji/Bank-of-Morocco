<?php

require_once("db.php");

class Permission extends Database {

    public function search($id) {
        $db = $this->connect();

        try {
            $sql = "SELECT permission.name FROM permission
                    JOIN permissionOfRole ON permission.id = permissionOfRole.permission_id
                    JOIN role ON permissionOfRole.role_id = role.name
                    JOIN roleOfUser ON role.name = roleOfUser.role_id
                    JOIN user ON roleOfUser.user_id = user.id
                    WHERE user.id = 1";
            $query = $db->query($sql);
            $data = $query->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function check($id, $permission) {

        try {
            $data = $this->search($id);
            if ($data["name"] != $permission) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

?>

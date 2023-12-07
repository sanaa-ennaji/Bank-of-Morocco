<?php

    require_once("db.php");

    class User extends Database {
        public function add($id, $username, $password, $nationality, $gendre, $address_id, $agency_id){
            $db = $this->connect();

            try {
                $sql = "INSERT INTO user VALUES (:id, :username, :password, :nationality, :gendre, :address_id, :agency_id)";

                $stmt = $db->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $password);
                $stmt->bindParam(":nationality", $nationality);
                $stmt->bindParam(":gendre", $gendre);
                $stmt->bindParam(":address_id", $address_id);
                $stmt->bindParam(":agency_id", $agency_id);

                $stmt->execute();
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }

        }

        public function edit($id, $username, $password, $nationality, $gendre, $agency_id){
            $db = $this->connect();

            try {
                $sql = "UPDATE user SET username = :username, password = :password, nationality = :nationality, gendre = :gendre, agency_id = :agency_id WHERE id = :id";

                $stmt = $db->prepare($sql);

                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $password);
                $stmt->bindParam(":nationality", $nationality);
                $stmt->bindParam(":gendre", $gendre);
                $stmt->bindParam(":agency_id", $agency_id);
                $stmt->bindParam(":id", $id);

                $stmt->execute();
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }

        }

        public function delete($id){
            $db = $this->connect();

            try {
                $sql = "DELETE FROM user WHERE id = :id";

                $stmt = $db->prepare($sql);
                $stmt->bindParam(":id", $id);

                $stmt->execute();
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }

        }

        public function search($id){
            $db = $this->connect();

            try {
                $sql = "SELECT * FROM user WHERE id = :id";

                $stmt = $db->prepare($sql);
                $stmt->bindParam(":id", $id);

                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }

        }

        public function display(){
            $db = $this->connect();

            try {
                $sql = "SELECT * FROM user";

                $data = $db->query($sql);

                return $data->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }

        }

        public function displayAll(){
            $db = $this->connect();

            try {
                $sql = "SELECT * FROM user JOIN roleOfUser ON user.id = roleOfUser.user_id JOIN role ON roleOfUser.role_id = role.name";

                $data = $db->query($sql);

                return $data->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }

        }

        public function getLast(){
            $db = $this->connect();

            try {
                $sql = "SELECT * FROM user ORDER BY id DESC LIMIT 1";

                $data = $db->query($sql);

                return $data->fetch(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }

        }

        public function getId($username){
            $db = $this->connect();

            try {
                $sql = "SELECT * FROM user WHERE username = :username";

                $stmt = $db->prepare($sql);
                $stmt->bindParam(":username", $username);

                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }

        }
    }

?>
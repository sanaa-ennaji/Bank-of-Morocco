<?php

    require_once("db.php");

    class Bank extends Database {
        
        public function add($id, $name, $logo){
            try {
                $sql = "INSERT INTO bank VALUES (:id, :name, :logo)";
                $stmt = $this->connect()->prepare($sql); 
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":logo", $logo);
                $stmt->execute();
            } catch (PDOException $e){
                die("Error: ". $e->getMessage());
            }
        }

        public function display(){
            try {
                $sql = "SELECT * FROM bank";
                $query = $this->connect()->query($sql);
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            } catch (PDOException $e){
                die("Error: " . $e->getMessage());
            }
        }

        public function search($id){
            try {
                $sql = "SELECT * FROM bank WHERE id = :id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                return $data;
            } catch (PDOException $e){
                die("Error: " . $e->getMessage());
            }
        }

        public function edit($id, $name, $logo){
            try {
                $sql = "UPDATE bank SET name = :name, logo = :logo WHERE id = :id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":logo", $logo);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (PDOException $e){
                    die("Error: " . $e->getMessage());
                
            }
        }

        public function delete($id){
            try {
                $sql = "DELETE FROM bank WHERE id = :id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (PDOException $e){
                die("Error: " . $e->getMessage());
            }
        }
    }

?>
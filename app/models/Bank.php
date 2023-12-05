<?php

    require_once("cnx.php");

    class Bank extends DataProvider {
        
        public function insert($name, $logo){
            try {
                $sql = "INSERT INTO bank (name, logo) VALUES (:name, :logo)";
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

        public function displayOne($id){
            try {
                $sql = "SELECT * FROM bank WHERE bankId = :id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                return $data;
            } catch (PDOException $e){
                die("Error: " . $e->getMessage());
            }
        }

        public function update($id, $name, $logo){
            try {
                $sql = "UPDATE bank SET name = :name, logo = :logo WHERE bankId = :id";
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
                $sql = "DELETE FROM bank WHERE bankId = :id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (PDOException $e){
                die("Error: " . $e->getMessage());
            }
        }
    }

?>
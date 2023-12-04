<?php

    require_once("components/password.php");

    define("HOST", "localhost");
    define("DB", "bank_7");
    define("USER", "root");

    class Database {

        public function connect() {
            try {
                $dsn = "mysql:host=" . HOST . ";dbname=" . DB;
                return new PDO($dsn, USER, PW);
            } catch(PDOException $e) {
                die("Error: " . $e->getCode());
            }
        }
    }

?>
<?php
    class db {
        // Properties for the database connection
        private $DB_HOST = 'localhost';
        private $DB_USER = 'root';
        private $DB_PASSWORD = '';
        private $DB_NAME = 'slimapp';

        // Connection
        public function connect() {
            try {
                $connection_string = "mysql:host=$this->DB_HOST;dbname=$this->DB_NAME";
                $db_connection = new PDO($connection_string, $this->DB_USER, $this->DB_PASSWORD);
                return $db_connection;
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
                die();
            }
        }
    }
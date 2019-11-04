<?php
    class firstNamesService {
        public static function findAll() {
            $db = new db();
            $db = $db->connect();
            $find_all_first_names_statement = $db->query(FIND_ALL_FIRST_NAMES_QRY);
            $first_names = $find_all_first_names_statement->fetchAll(PDO::FETCH_OBJ);
            return $first_names;
        }
    }
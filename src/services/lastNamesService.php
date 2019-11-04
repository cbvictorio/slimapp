<?php
    class lastNamesService {
        public static function findAll() {
            $db = new db();
            $db = $db->connect();
            $find_all_last_names_statement = $db->query(FIND_ALL_LAST_NAMES_QRY);
            $last_names = $find_all_last_names_statement->fetchAll(PDO::FETCH_OBJ);
            return $last_names;
        }
    }
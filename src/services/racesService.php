<?php
    class racesService {
        public static function findAll() {
            $db = new db();
            $db = $db->connect();
                
            $all_races_statement = $db->query(FIND_ALL_RACES_QRY);
            $races = $all_races_statement->fetchAll(PDO::FETCH_OBJ);

            foreach ($races as $race) {
                $id = $race->id;
                $classes_by_race_statement = $db->prepare(FIND_ALL_CLASSES_BY_RACE);
                $classes_by_race_statement->execute([$id]);
                    $classes_by_race = $classes_by_race_statement->fetchAll(PDO::FETCH_OBJ);
                if (!empty($classes_by_race)) {
                     $race->possible_classes = $classes_by_race;
                }
            }

            return $races;      
        }

        public static function findById($id) {
            $db = new db();
            $db = $db->connect();
            $find_race_statement = $db->prepare(FIND_RACE_BY_ID_QRY);
            $find_race_statement->execute([$id]);
            $race = $find_race_statement->fetchAll(PDO::FETCH_OBJ);
            return $race;
        }

        public static function findMostFamous() {
            $db = new db();
            $db = $db->connect();
            $find_race_statement = $db->query(FIND_MOST_FAMOUS_RACE_QRY);
            $race_found = $find_race_statement->fetchAll(PDO::FETCH_OBJ);
            if (empty($race_found)) {
                return new stdClass();
            }
            $race = $race_found[0];
            $id = $race->races_id;
            $mostFamousRace = self::findById($id);
            return $mostFamousRace;
        }

    }

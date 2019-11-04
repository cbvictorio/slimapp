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

    }

<?php
    class classesService {
        public static function findAll() {
            $db = new db();
            $db = $db->connect();
                
            $all_classes_statement = $db->query(FIND_ALL_CLASSES_QRY);
            $classes = $all_classes_statement->fetchAll(PDO::FETCH_OBJ);

            foreach($classes as $class) {
                $id = $class->id;
                $weapons_by_class_statement = $db->prepare(FIND_ALL_WEAPONS_BY_CLASS);
                $weapons_by_class_statement->execute([$id]);
                $weapons_by_class = $weapons_by_class_statement->fetchAll(PDO::FETCH_OBJ);
                if (!empty($weapons_by_class)) {
                    $class->possible_weapons = $weapons_by_class;
                }
            }

            return $classes;
        }
    }
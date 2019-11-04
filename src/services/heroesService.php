<?php
    class heroesService {

        public static function findById($id) {
            $db = new db();
            $db = $db->connect();
            $find_hero_statement = $db->prepare(FIND_HERO_BY_ID_QRY);
            $find_hero_statement->execute([$id]);
            $hero = $find_hero_statement->fetchAll(PDO::FETCH_OBJ);
            return $hero;
        }

        public static function findAll() {
            $db = new db();
            $db = $db->connect();
            $find_all_heroes_statement = $db->query(FIND_ALL_HEROES_QRY);
            $heroes = $find_all_heroes_statement->fetchAll(PDO::FETCH_OBJ);
            return $heroes;
        }

        public static function create($heroe) {
            $id = uniqid("", true);
            $first_name = $heroe->first_name;
            $last_name = $heroe->last_name;
            $races_id = $heroe->races_id;
            $classes_id	= $heroe->classes_id;
            $weapon_id = $heroe->weapon_id;
            $strength = $heroe->strength;
            $intelligence = $heroe->intelligence;
            $dexterity = $heroe->dexterity;

            $db = new db();
            $db = $db->connect();

            $create_heroe_statement = $db->prepare(CREATE_HERO_QRY);
            $created_hero = $create_heroe_statement->execute([$id, $first_name, $last_name, $races_id, $classes_id, $weapon_id, $strength, $intelligence, $dexterity]);

            $new_hero = self::findById($id);
            return $new_hero;
        }

        public static function update($id, $heroe) {
            $first_name = $heroe->first_name;
            $last_name = $heroe->last_name;
            $races_id = $heroe->races_id;
            $classes_id = $heroe->classes_id;
            $weapon_id = $heroe->weapon_id;
            $strength = $heroe->strength;
            $intelligence = $heroe->intelligence;
            $dexterity = $heroe->dexterity;

            $db = new db();
            $db = $db->connect();

            $modify_heroe_statement = $db->prepare(MODIFY_HERO_QRY);
            $modified_hero = $modify_heroe_statement->execute([$first_name, $last_name, $races_id, $classes_id, $weapon_id, $strength, $intelligence, $dexterity, $id]);

            $found_hero = self::findById($id);
            return $found_hero;
        }
    }
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

        public static function findMostFamousByName() {
            $db = new db();
            $db = $db->connect();
            $find_hero_statement = $db->query(FIND_MOST_FAMOUS_HERO_BY_NAME_QRY);
            $hero = $find_hero_statement->fetchAll(PDO::FETCH_OBJ);
            if (empty($hero)) {
                return new stdClass();
            }
            return $hero[0];
        }

        public static function findAll() {
            $db = new db();
            $db = $db->connect();
            $find_all_heroes_statement = $db->query(FIND_ALL_HEROES_QRY);
            $heroes = $find_all_heroes_statement->fetchAll(PDO::FETCH_OBJ);
            
            foreach($heroes as $hero) {
                $weapon_id = $hero->weapon_id;
                $race_id = $hero->races_id;
                $class_id = $hero->classes_id;

                $weapon = weaponService::findById($weapon_id);
                $race = racesService::findById($race_id);
                $class = classesService::findById($class_id);

                unset($hero->weapon_id);
                unset($hero->races_id);
                unset($hero->classes_id);

                $hero->weapon = $weapon;
                $hero->class = $class;
                $hero->race = $race;
            }

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

            $db = new db();
            $db = $db->connect();

            $modify_heroe_statement = $db->prepare(MODIFY_HERO_QRY);
            $modified_hero = $modify_heroe_statement->execute([$first_name, $last_name, $races_id, $classes_id, $weapon_id, $id]);

            $found_hero = self::findById($id);
            return $found_hero;
        }

        public static function delete($id) {
            $db = new db();
            $db = $db->connect();
            $modify_heroe_statement = $db->prepare(DELETE_HERO_QRY);
            $modified_hero = $modify_heroe_statement->execute([$id]);
            $found_hero = self::findById($id);
            return $found_hero;
        }
    }
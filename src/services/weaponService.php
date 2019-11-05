<?php
    class weaponService {

        public static function findById($id) {
            $db = new db();
            $db = $db->connect();
            $find_weapon_statement = $db->prepare(FIND_WEAPON_BY_ID_QRY);
            $find_weapon_statement->execute([$id]);
            $weapon = $find_weapon_statement->fetchAll(PDO::FETCH_OBJ);
            
            return $weapon;
        }

        public static function findMostFamous() {
            $db = new db();
            $db = $db->connect();
            $find_weapon_statement = $db->query(FIND_MOST_FAMOUS_WEAPON_QRY);
            $weapon_found = $find_weapon_statement->fetchAll(PDO::FETCH_OBJ);
            if (empty($weapon_found)) {
                return new stdClass();
            }
            $weapon = $weapon_found[0];
            $id = $weapon->weapon_id;
            $mostFamousWeapon = self::findById($id);
            return $mostFamousWeapon[0];
        }
    }
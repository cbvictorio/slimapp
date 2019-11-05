<?php
    
    /* RACES */
    
    // Define query to find the list of all available races
    define("FIND_ALL_RACES_QRY", "SELECT * FROM RACES");

    // Define query to find the list of all available races
    define("FIND_RACE_BY_ID_QRY", "SELECT * FROM RACES WHERE id = ?");

     // Define query to find the list of all available classes per race
     define(
         "FIND_ALL_CLASSES_BY_RACE", 
         "
            SELECT DISTINCT 
                classes.id, 
                classes.name 
            FROM 
                classes, 
                races, 
                class_limitations 
            WHERE 
                classes.id = class_limitations.classes_id AND class_limitations.races_id = ?
         "
    );

    // Define query to find the most famous race
    define(
        "FIND_MOST_FAMOUS_RACE_QRY",
        "
            SELECT 
                    races_id, 
                    COUNT(heroes.first_name) mycount 
                FROM 
                    heroes
                WHERE
                    heroes.deleted = 0 
                GROUP BY 
                    races_id 
                ORDER BY 
                    mycount 
                DESC
                    limit 1
        "
    );

    /* CLASSES */

    // Define query to find the list of all available classes
    define("FIND_ALL_CLASSES_QRY", "SELECT * FROM CLASSES");

    // Define query to find a class by id
    define("FIND_CLASS_BY_ID_QRY", "SELECT * FROM CLASSES WHERE id = ?");
    
    // Define query to find the list of all available weapons per class
    define(
        "FIND_ALL_WEAPONS_BY_CLASS", 
        "
            SELECT DISTINCT 
                weapons.id, 
                weapons.name 
            FROM 
                classes, 
                weapons, 
                weapon_limitation 
            WHERE 
                weapons.id = weapon_limitation.weapon_id AND weapon_limitation.classes_id = ?
        "
    );

    /* HEROES */

    // Define query to find a specific hero
    define("FIND_HERO_BY_ID_QRY", "SELECT * FROM heroes WHERE id = ? AND deleted = 0");

    // Define query to find all heroes
    define("FIND_ALL_HEROES_QRY", "SELECT * FROM heroes WHERE deleted = 0");

    // Define query to create a hero
    define(
        "CREATE_HERO_QRY", 
        "
            INSERT 
            INTO `heroes` (
                `id`, 
                `first_name`, 
                `last_name`, 
                `races_id`, 
                `classes_id`, 
                `weapon_id`, 
                `strength`, 
                `intelligence`, 
                `dexterity`
            ) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        "
    );

    // Define a query to modify/update a hero
    define(
        "MODIFY_HERO_QRY",
        "
            UPDATE `heroes` 
                SET 
                    `first_name` = ?, 
                    `last_name` = ?, 
                    `races_id` = ?, 
                    `classes_id` = ?, 
                    `weapon_id` = ?
                WHERE 
                    `heroes`.`id` = ?
        "
    );

    // Define a query to delete a hero (soft delete)
    define("DELETE_HERO_QRY", "UPDATE HEROES SET heroes.deleted = 1 WHERE heroes.id = ?");

    // Define a query to know which is the most famous hero by first name
    define (
        "FIND_MOST_FAMOUS_HERO_BY_NAME_QRY",
        "
            SELECT 
                first_name, 
                COUNT(heroes.first_name) mycount 
            FROM 
                heroes
            WHERE
                heroes.deleted = 0 
            GROUP BY 
                first_name 
            ORDER BY 
                mycount 
            DESC 
                limit 1"
    );

    /* FIRST NAMES */
    
    // Define a query to retrieve all the possible first names for classes
    define("FIND_ALL_FIRST_NAMES_QRY", "SELECT * FROM FIRST_NAMES_CATALOG");

    /* LAST NAMES */
    
    // Define a query to retrieve all the possible last names for classes
    define("FIND_ALL_LAST_NAMES_QRY", "SELECT * FROM LAST_NAMES_CATALOG");

    /* WEAPONS */

    // Define query to find a weapon by id
    define("FIND_WEAPON_BY_ID_QRY", "SELECT * FROM WEAPONS WHERE id = ?");

    // Define query to find the most famous weapon
    define(
        "FIND_MOST_FAMOUS_WEAPON_QRY", 
        "
            SELECT 
                heroes.weapon_id,
                COUNT(heroes.weapon_id) mycount 
            FROM 
                heroes
            WHERE
                heroes.deleted = 0
            GROUP BY 
                weapon_id 
            ORDER BY 
                mycount 
            DESC 
                limit 1
        ");



    